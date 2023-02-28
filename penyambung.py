import mysql.connector
import csv
from datetime import datetime 

mydb = mysql.connector.connect(
    host = "localhost",
    user = "root",
    password = "",
    database = "absensi",
    autocommit=True
)

mycursor = mydb.cursor()

with open('id-names.csv', 'r') as file:
    reader = csv.reader(file)
    next(reader)
    for row in reader:
        name = "Raffa"
        waktu = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        print(name)
        print(waktu)
        query = "INSERT INTO absen (name, waktu) VALUES (%s, %s)"
        values = (name, waktu)
        mycursor.execute(query, values)

mydb.commit()
mydb.close()


