from tkinter import *
from functools import partial
from threading import Timer
import random
root = Tk()
root.title('C109152310 黃弘儒 麻阿台')
cout=0
counter=1
money=100
up=0.01
B1=[]  #+
B2=[] #-
L1=[] #加注區的數字
number=[]    #幾次
times=[]     #倍率
logo=[]   #rand 區的24個
logo1=[]  #加注區的 8個
fruit=[] #水果名稱
fruit_num=[] #水果數量
image_list=["image\\apple.png","image\\betelnut.png","image\\double7.png","image\\grape.png","image\\orange.png","image\\ring.png","image\\star.png","image\\watermelon.png"]
name=["apple","betelnut","double7","grape","orange","ring","star","watermelon"]
num=[[0,0],[0,1],[0,2],[0,3],[0,4],[0,5],[0,6],[1,6],[2,6],[3,6],[4,6],[5,6],[6,6],[6,5],[6,4],[6,3],[6,2],[6,1],[6,0],[5,0],[4,0],[3,0],[2,0],[1,0]]

for a in range(8):
    logo1.append((PhotoImage(file=image_list[a])))
    number.append(0)
    times.append(0)
    B1.append(0)
    B2.append(0)
    L1.append(0)
#------------------------------水果出現-------------------------------------------------------------------------------------------------------------------------------------------   
for x in range(8):
    logo.append((PhotoImage(file=image_list[x])))
    fruit.append(0)
    fruit_num.append(0)
b=0
while(b!=8):
    a=random.randint(0,7)
    if(fruit[a]==0):
        logo[a]=(PhotoImage(file=image_list[b]))
        fruit[a]=name[b]
        b+=1
for y in range(16):
    a=random.randint(0,7)
    logo.append((PhotoImage(file=image_list[a])))
    fruit.append(name[a])   
#---------------------------倍率------------------------------------------------------------------------------------------------------------------------------------------------
for a in range(24):
    for b in range(8):
        if(fruit[a]==name[b]):
            fruit_num[b]+=1
for a in range(8):
    if(fruit_num[a]==1):
        times[a]=8
    elif(fruit_num[a]==2):
        times[a]=6.9
    elif(fruit_num[a]==3):
        times[a]=5.8
    elif(fruit_num[a]==4):
        times[a]=4.5
    elif(fruit_num[a]==5):
        times[a]=3
    elif(fruit_num[a]>=6):
        times[a]=1.7  
#----------------------------------------------加注區--------------------------------------------------------------------------------------------------------------------------------------------------------- 
def plus(i):
    global number,money,B1,L1
    if(money>=1):
        money-=1
        number[i]+=1
        L1[i]['text']=(str(number[i]))
        labelText1.set('金額:'+str(money))
def less(i):
    global number,money,B2,L1
    if(number[i]!=0):
        money+=1
        number[i]-=1
        L1[i]['text']=(str(number[i]))
        labelText1.set('金額:'+str(money))
#--------------------------------------------旋轉時的動作---------------------------------------------------------------------------------------------------------------------------    
def game():
    global labelText,start,B1,B2
    start['state']="disabled"
    for a in range(24):
        if(a<8):
            B1[a]['state']="disabled"
            B2[a]['state']="disabled"
        Label(frame1,image=logo[a]).grid(row=(num[a][0]),column=(num[a][1]))
    run=random.randint(0,23)
    Label(frame1,image=logo[run],bg="#FF00FF").grid(row=(num[run][0]),column=(num[run][1]))
    t = Timer(up, change_time,[run])
    t.start()

def change_time(run):
    global t,counter,up,labelText,money,times,number,B1,B2,L1,name
    if(up<=0.0115):
        up=up*1.002
    else:
        up=up*1.15
    #print(up)
    run+=1
    if(run==24):
        run=0
    labelText.set(fruit[run])
    Label(frame1,image=logo[run-1]).grid(row=(num[run-1][0]),column=(num[run-1][1]))
    Label(frame1,image=logo[run],bg="#FF00FF").grid(row=(num[run][0]),column=(num[run][1]))
    rand=random.randint(10,15)
#-----------------------------------------------------------遊戲結束--------------------------------------------------------------------------------------------------------
    if(up>=rand*0.1):     
        a=0
        while(1):
            if(fruit[run]==name[a]):
                money=(money)+(times[a]*number[a])
                labelText1.set('金額:'+str(money))
                start['state']="active"
                for b in range(8):
                    B1[b]['state']="active"
                    B2[b]['state']="active"
                    number[b]=0
                    L1[b]['text']=(str(number[b]))
                break;
            else:
                a+=1
        t.cancel()
        up=0.01
    else:
        t = Timer(up, change_time,[run])
        t.start()
#-------------------------------------------------------------main-------------------------------------------------------------------------------------------------------
        
frame1=Frame()
frame1.grid()
frame=Frame()
frame.grid()
frame2=Frame()
frame2.grid()

for i in range(24):
    Label(frame1,image=logo[i]).grid(row=num[i][0],column=num[i][1])
    
start=Button(frame1,text="start",height=3,width=6,command=partial(game))
start.grid(row=3,column=3)

labelText = StringVar()
labelText.set('')
labelText1 = StringVar()
labelText1.set('金額:'+str(money))
Label(frame1, width=10,textvariable=labelText).grid(row=4,column=3)

Label(frame2,text='').grid(row=0,column=0)
Label(frame,textvariable=labelText1).grid(row=1,column=0)
for i in range(8):
    Label(frame2,image=logo1[i]).grid(row=2,column=i)
    B1[i]=Button(frame2,text='加注',height=2,width=5,command=partial(plus,i))
    B1[i].grid(row=3,column=i)
    L1[i]=Label(frame2,text=str(number[i]))
    L1[i].grid(row=4,column=i)
    B2[i]=Button(frame2,text='減注',height=2,width=5,command=partial(less,i))
    B2[i].grid(row=5,column=i)
    Label(frame2,text=str(times[i])).grid(row=7,column=i)
Label(frame2,text='水果倍率').grid(row=6,column=0)

root.mainloop()
