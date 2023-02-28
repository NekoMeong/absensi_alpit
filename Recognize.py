#!C:\Users\ASUS\AppData\Local\Microsoft\WindowsApps\PythonSoftwareFoundation.Python.3.9_qbz5n2kfra8p0\python.exe

import pandas as pd
import numpy as np
import cv2 as cv
import mysql.connector
from datetime import datetime , time
import keyboard
import pytz


id_names = pd.read_csv('id-names.csv')
id_names = id_names[['id', 'name']]

faceClassifier = cv.CascadeClassifier('Classifiers/haarface.xml')

lbph = cv.face.LBPHFaceRecognizer_create(threshold=500)
lbph.read('Classifiers/TrainedLBPH.yml')
mydb = mysql.connector.connect(
    host = "localhost",
    user = "root",
    password = "",
    database = "absensi",
    autocommit=True
)
camera = cv.VideoCapture(0)
mycursor = mydb.cursor()
while cv.waitKey(1) & 0xFF != ord('q'):
    _, img = camera.read()
    grey = cv.cvtColor(img, cv.COLOR_BGR2GRAY)

    faces = faceClassifier.detectMultiScale(grey, scaleFactor=1.1, minNeighbors=4)

    for x, y, w, h in faces:
        faceRegion = grey[y:y + h, x:x + w]
        faceRegion = cv.resize(faceRegion, (220, 220))

        label, trust = lbph.predict(faceRegion)
        try:
            name = id_names[id_names['id'] == label]['name'].item()
            cv.rectangle(img, (x, y), (x + w, y + h), (0, 0, 255), 2)
            cv.putText(img, name, (x, y + h + 30), cv.FONT_HERSHEY_COMPLEX, 1, (0, 0, 255))
        except:
            pass

    cv.imshow('Recognize', img)
    batas = time(21,30)
    if keyboard.is_pressed ('a') :
        indonesia = pytz.timezone("Asia/Jakarta")
        waktu = datetime.now(indonesia).strftime("%Y-%m-%d %H:%M:%S")
        waktu_sekarang = datetime.now(indonesia)
        jam_masuk = waktu_sekarang.replace(hour=11, minute=10, second=0, microsecond=0)
        if waktu_sekarang > jam_masuk:
            status = "Telat"
        else:
            status = "Tepat Waktu"
        query = "INSERT INTO absen (name, waktu, status) VALUES (%s, %s, %s)"
        values = (name, waktu, status)
        mycursor.execute(query, values)
    
camera.release()
cv.destroyAllWindows()
