from tkinter import *
from functools import partial
from threading import Timer
import random
root = Tk()
root.title('C109152310 黃弘儒 踩地雷')
B=[]  #地雷區的button
area=[] #地雷及數字分布
touch=[] #是否被按過
L=[0,0]
time=0
t=None
number=0
jug=0

def change_time():
    global time,L,t
    time+=1
    L[0]['text']='花費時間:'+str(time)
    t = Timer(1,change_time)
    t.start()


def start(): 
    global area,B,t,time,number,jug
#-----------------------------------------產生地雷-----------------------------------------------------------------------------------------------------------------------------------
    a=random.randint(12,15) #地雷數量
    number=a
    long=len(area)
    if(long==0):
        for i in range(100):
            area.append(0)
            touch.append(0)
    else:
        area.clear()
        touch.clear()
        for i in range(100):
            B[i]['state']="active"
            B[i]['text']=''
            L[1]['text']='遊戲中'
            area.append(0)
            touch.append(0)
        if(jug!=0):
            t=None
            time=-1
            t = Timer(1,change_time)
            t.start()
        else:
            t.cancel()
            t=None
            time=-1
            t = Timer(1,change_time)
            t.start()
    jug=0
    while(a!=0):
        p=random.randint(0,99) #位置
        if(area[p]==0):
            area[p]='*'
            a-=1
#------------------------------周圍有幾個地雷-----------------------------------------------------------------------------------------------------------------------------
    for i in range(100):
        boom=0
        if(area[i]==0):
            if(i>0 and i%10!=0):
                if(area[i-1]=='*'):
                    boom+=1
            if(i>=9 and i%10!=9):
                if(area[i-9]=='*'):
                    boom+=1
            if(i>=10):
                if(area[i-10]=='*'):
                    boom+=1
            if(i>=11 and i%10!=0):
                if(area[i-11]=='*'):
                    boom+=1
            if(i<99 and i%10!=9):
                if(area[i+1]=='*'):
                    boom+=1
            if(i<=90 and i%10!=0):
                if(area[i+9]=='*'):
                    boom+=1
            if(i<=89):
                if(area[i+10]=='*'):
                    boom+=1
            if(i<=88 and i%10!=9):
                if(area[i+11]=='*'):
                    boom+=1
            area[i]=(boom)
#--------------------------------------------驗證------------------------------------------------------------------------------------------------------------------------            
    for i in range(100):  
        if(i%10!=9):
            print(area[i],end=' ')
        else:
            print(area[i],end='\n')
    print()
#------------------------------------------------------按下button---------------------------------------------------------------------------------------------------------------
def push(i,j):
    global area,B,touch,L,t,number,jug

    if(area[i*10+j]=='*'):   #踩到地雷!!!
        for i in range(100):
            if(area[i]=='*' or touch[i]==1):
                B[i]['text']= str(area[i])
                B[i]['state']="disabled"
            elif(touch[i]==0):
                B[i]['text']=''
                B[i]['state']="disabled"
        L[1]['text']='失敗'
        t.cancel()
        jug=1
    elif(area[i*10+j]!='*' and area[i*10+j]!=0):   #碰到正常按鈕且不是0
        B[i*10+j]['text']=str(area[i*10+j])
        B[i*10+j]['state']="disabled"
        touch[i*10+j]=1
        
    elif(area[i*10+j]==0):                      #遇到0之後
        ju=0
        place=i*10+j        #目前位置
        zero(i,j,ju,place)  #進入判斷周圍是否為0的函式
#---------------------------------------------------------判斷是否成功---------------------------------------------------------------------------------------------------------------------------------
    cout=0
    for x in range(100):
        if(touch[x]==1):
            cout+=1
    if((100-cout)==number):
        L[1]['text']='成功'
        t.cancel()
        jug=1
#----------------------------------------------------判斷周圍是否為0的函式----------------------------------------------------------------------------------------------------------------------------------1
def zero(i,j,ju,place):
    global area,B,touch
    if(area[place]==0 and ju==0 and touch[place]==0):
        B[place]['text']=str(area[place])
        B[place]['state']="disabled"
        touch[place]=1
        if(place<99 and place%10!=9):
            place+=1
            zero(i,j,1,place)     #right
            place-=1
        if(place>0 and place%10!=0):
            place-=1
            zero(i,j,2,place)     #left
            place+=1
        if(place<=89):
            place+=10
            zero(i,j,3,place)     #down
            place-=10
        if(place>=10):
            place-=10
            zero(i,j,4,place)     #up
            place+=10
    if(area[place]==0 and ju==1 and touch[place]==0):
        B[place]['text']=str(area[place])
        B[place]['state']="disabled"
        touch[place]=1
        if(place<99 and place%10!=9):
            place+=1
            zero(i,j,1,place)     #right
            place-=1
        if(place<=89):
            place+=10
            zero(i,j,3,place)     #down
            place-=10
        if(place>=10):
            place-=10
            zero(i,j,4,place)     #up
            place+=10
    if(area[place]==0 and ju==2 and touch[place]==0):
        B[place]['text']=str(area[place])
        B[place]['state']="disabled"
        touch[place]=1
        if(place>0 and place%10!=0):
            place-=1
            zero(i,j,2,place)     #left
            place+=1
        if(place<=89):
            place+=10
            zero(i,j,3,place)     #down
            place-=10
        if(place>=10):
            place-=10
            zero(i,j,4,place)     #up
            place+=10
    if(area[place]==0 and ju==3 and touch[place]==0):
        B[place]['text']=str(area[place])
        B[place]['state']="disabled"
        touch[place]=1
        if(place<99 and place%10!=9):
            place+=1
            zero(i,j,1,place)     #right
            place-=1
        if(place>0 and place%10!=0):
            place-=1
            zero(i,j,2,place)     #left
            place+=1
        if(place<=89):
            place+=10
            zero(i,j,3,place)     #down
            place-=10
    if(area[place]==0 and ju==4 and touch[place]==0):
        B[place]['text']=str(area[place])
        B[place]['state']="disabled"
        touch[place]=1
        if(place<99 and place%10!=9):
            place+=1
            zero(i,j,1,place)     #right
            place-=1
        if(place>0 and place%10!=0):
            place-=1
            zero(i,j,2,place)     #left
            place+=1
        if(place>=10):
            place-=10
            zero(i,j,4,place)     #up
            place+=10
#-------------------------------------------main----------------------------------------------------------------------------------------------------------------------------
start()

frame1=Frame()
frame1.grid()
frame2=Frame()
frame2.grid()
for i in range(10):
    for j in range(10):
        B.append(0)
        B[i*10+j]=Button(frame1,text="",height=3,width=6,command=partial(push,i,j))
        B[i*10+j].grid(row=i,column=j)
Button(frame1,text="重新開始",height=2,width=12,command=partial(start)).grid(row=100,column=0,columnspan=2)
L[0]=Label(frame1,text='花費時間:'+str(time),height=2,width=12)
L[0].grid(row=100,column=3,columnspan=2)
L[1]=Label(frame1,text='遊戲中',height=2,width=12)
L[1].grid(row=100,column=5,columnspan=2)
t = Timer(1,change_time)
t.start()

root.mainloop()
#--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
