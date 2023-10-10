import pymysql
from flask import Flask
sta = ""
strr = ""

app = Flask(__name__)  # __name__ 代表目前執行模駔

@app.route("/")
#*******************註冊*******************
@app.route("/R/<R_name>/<R_mail>/<R_password>", methods=['POST'])  # 函式裝飾
def sign(R_name, R_mail, R_password):  # 註冊
    #db = pymysql.connect(host="127.0.0.1", user="admin",
     #                    password="lty7231113", database="newdatabase")
    db = pymysql.connect(host="127.0.0.1", user="henry",
                         password="Hh7016979", database="newdatabase")
    cursor = db.cursor()
    iii = cursor.execute(
        "SELECT password FROM newtable where name= %s", (R_name))
    kkk = cursor.execute(
        "SELECT password FROM newtable where name= %s", (R_mail))
    print(iii, kkk)
    if (iii != 0 or kkk != 0):
        sta = "名字或信箱@已使用"
    else:
        sta = "註冊成功"
        cursor.execute(
            "INSERT INTO newtable(name, mail, password, planch, squat_times, pushups) VALUES (%s,%s,%s,0,0,0)", (R_name, R_mail, R_password))  # 插入資料
    db.commit()
    print(R_name)
    return f"{sta}"


#*******************登入*******************
@app.route("/L/<L_mail>/<L_password>", methods=['POST'])
def Login(L_mail, L_password):  # 登入
    #db = pymysql.connect(host="127.0.0.1", user="admin",
    #                     password="lty7231113", database="newdatabase")
    db = pymysql.connect(host="127.0.0.1", user="henry",
                         password="Hh7016979", database="newdatabase")
    cursor = db.cursor()
    countt = cursor.execute(
        "SELECT password FROM newtable where mail= %s", (L_mail))
    # 搜尋資料
    ################################要藥要改mail mail mail mail找name
    ppp = cursor.fetchone()
    if (countt != 0):
        if (ppp[0] == L_password):
            sta = "success"
            cursor.execute(
                "SELECT name FROM newtable where mail= %s", (L_mail))
            ppp = cursor.fetchone()
            sta = "OK"
            return f"{ppp[0]}"
        else:
            sta = "帳號或密碼@錯誤"
    else:
        sta = "帳號或密碼@錯誤"
    db.commit()
    return f"{sta}"

######################更改資料################################
@app.route("/up/<up_name>/<up_data>/<up_sta>" , methods=['POST'])
def change(up_name, up_data, up_sta): # 登入
    db = pymysql.connect(host="127.0.0.1", user="henry",
                        password="Hh7016979", database="newdatabase")
    cursor = db.cursor()
    ############ ######要要改每個運動的次數
    if(up_sta == 0):#深蹲
        countt = cursor.execute( "SELECT password FROM newtable where name= %s", (up_name))
        print(countt)
    #搜尋資料
    elif(up_sta==1):#棒示
        countt = cursor.execute( "SELECT password FROM newtable where name= %s", (up_name))
    #搜尋資料
    elif(up_sta==2):#伏地挺身
        countt = cursor.executed("SELECT password FROM newtable where name= %s", (up_name))
    #搜尋資料


#*******************留言*******************
"""
@app.route("/M/<M_name>/<M_messange>/<M_time>", methods=['GET'])
def message(M_name, M_messange, M_time):  # 留言
    db = pymysql.connect(host="127.0.0.1", user="admin",
                         password="lty7231113", database="newdatabase")
    cursor = db.cursor()
    cursor.execute(
        "INSERT INTO message(name, messange, time) VALUES (%s,%s,%s)", (M_name, M_messange, M_time))  # 插入資料

    db.commit()
    ppp = cursor.execute("SELECT * FROM message")
    aaa = cursor.fetchall()
    ree = ""
    for i in range(0, ppp):
        for j in range(0, 3):
            ree += str(aaa[i][j]) + " "
    return f"{ ree}"
    """

# if __name__ == '__main__':
#    app.run()
