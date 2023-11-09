#!/bin/python
from flask import Flask
from flask import render_template
from flask import Response
import cv2
import numpy as np

#Web Camera
cap1 = cv2.VideoCapture(0)
cap1.set(3,320)
cap1.set(4,240)
cap2 = cv2.VideoCapture(2)
cap2.set(3,320)
cap2.set(4,240)


min_width_react=30 #min width reactangle
min_hiegth_react=30 #min higth reactangle

count_line_position = 110
# Initiazile Substructor
algo = cv2.bgsegm.createBackgroundSubtractorMOG()


def center_handle(x,y,w,h):
	x1=int(w/2)
	y1=int(h/2)
	cx= x+x1
	cy= y+y1
	return cx,cy

detect = []
offset=6 #Allowable error betwen pixel
counter=0
counter1=0

def generate():
     global counter
     while True:
        ret1, frame1 = cap1.read()
        grey = cv2.cvtColor(frame1,cv2.COLOR_BGR2GRAY)
        blur = cv2.GaussianBlur(grey,(3,3),5)
        # applyin on each frame
        img_sub = algo.apply(blur)
        dilat = cv2.dilate(img_sub,np.ones((5,5)))
        kernel = cv2.getStructuringElement(cv2.MORPH_ELLIPSE,(5,5))
        dilatada = cv2.morphologyEx(dilat,cv2.MORPH_CLOSE,kernel)
        dilatada = cv2.morphologyEx(dilatada,cv2.MORPH_CLOSE,kernel)
        counterSahpe,h = cv2.findContours(dilatada, cv2.RETR_TREE, cv2.CHAIN_APPROX_SIMPLE)
        
        cv2.line(frame1,(25,count_line_position),(300,count_line_position),(255,127,0),3)
        for (i,c) in enumerate(counterSahpe):
            (x,y,w,h) = cv2.boundingRect(c)
            validate_counter = (w>= min_width_react) and (w>= min_hiegth_react)
            if not validate_counter:
                continue
            cv2.rectangle(frame1,(x,y),(x+w,y+h),(0,255,0),2)
            cv2.putText(frame1,"VEHICLE"+str(counter),(x,y-20),cv2.FONT_HERSHEY_TRIPLEX,1,(255,244,0),2)
            center= center_handle(x,y,w,h)
            detect.append(center)
            cv2.circle(frame1,center,4, (0,0,255),-1)
            for(x,y) in detect:
                if y<(count_line_position+offset) and y>(count_line_position-offset):
                    counter+=1
                    cv2.line(frame1,(25,count_line_position),(300,count_line_position),(0,127,255),3)
                    detect.remove((x,y))
                    print("Vehicle:"+str(counter))
        cv2.putText(frame1,""+str(counter),(30,30),cv2.FONT_HERSHEY_SIMPLEX,1,(0,255,0),2)
        if (counter) >= 4:
            cv2.putText(frame1,"JALAN PADAT",(80,30),cv2.FONT_HERSHEY_SIMPLEX,1,(0,0,255),2)
            cv2.putText(frame1,"Cari jalur lain",(40,230),cv2.FONT_HERSHEY_SIMPLEX,1,(0,0,255),2)
        elif (counter) >= 2:
            cv2.putText(frame1,"JALAN RAMAI",(80,30),cv2.FONT_HERSHEY_SIMPLEX,1,(255,165,3),2)
            cv2.putText(frame1,"Bisa lewat jalan ini",(15,230),cv2.FONT_HERSHEY_SIMPLEX,1,(255,165,3),2)
        else:
            cv2.putText(frame1,"JALAN SEPI",(80,30),cv2.FONT_HERSHEY_SIMPLEX,1,(27,128,1),2)
            cv2.putText(frame1,"Lewat jalan ini!",(40,230),cv2.FONT_HERSHEY_SIMPLEX,1,(27,128,1),2)
        (flag, encodedImage) = cv2.imencode(".jpg", frame1)

        
        if not flag:
            continue
        yield(b'--frame\r\n' b'Content-Type: image/jpeg\r\n\r\n' +
            bytearray(encodedImage) + b'\r\n')


cap1.release()

