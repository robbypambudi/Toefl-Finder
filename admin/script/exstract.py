

from json import JSONDecoder
import os
import os.path
from asyncore import write
from turtle import pen
import requests
import json
from lxml import html
import re

os.chdir(r'C:\xampp\htdocs\tugasbesar\admin\script')
url = "https://bahasa.its.ac.id/cari_hasil_tes.php"
# Membuka sesi http

session = requests.session()

cek = session.get(url)
# Open File Contain JSON
f = open("data.json", "r")
data = json.loads(f.read())

# Print JSON ddata nama
if (data["metode"] == "nim"):
    post_data = {
        "sasaran_cari": 1,
        "kat_cari": 2,
        "txt_cari": data["nama"],
        "cari_data": "Cari Data"
    }

else:
    post_data = {
        "sasaran_cari": 1,
        "kat_cari": 1,
        "txt_cari": data["nama"],
        "cari_data": "Cari Data"
    }


website = session.post(f"{url}", data=post_data, timeout=60)

try:
    # Mendapatkan data HTML dari website
    data = re.findall('<span class="textnya">(.*?)</span>', website.text)

    # Print data into JSON
    result = {
        "nama": data[0],
        "Institut": data[1],
        "NRP": data[2],
        "Jurusan": data[3],
        "Status": data[4],
        "Tanggal": data[5],
        "Waktu": data[6],
        "scor1": data[7],
        "scor2": data[8],
        "scor3": data[9],
        "score": data[10],
        "bahasa": data[11],
    }

    w = open("result.json", "w")  # Open File to write
    w.write(json.dumps(result))

    print("Selesai")

except Exception as e:
    # Remove File
    os.remove("result.json")
