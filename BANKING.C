#include<stdio.h>
struct customer
{
char cus_name[100];
int acc_no;
int amount;
}list[100];
void accept(struct customer[],int);
void display(struct customer[],int);
void display_all(struct customer[],int);
void withdraw(struct customer[],int,int);
void deposit(struct customer[],int,int);
void accept(struct customer list[100],int n)
{
int i;
for(i=0;i<n;i++)
{
printf("Enter details for record #%d",i+1);
printf("\n ENTER NAME OF THE CUSTOMER=");
scanf("%s",&list[i].cus_name);
fflush(stdin);
printf("\n ENTER ACCOUNT NO.:");
scanf("%d",&list[i].acc_no);
printf("\n ENTER AMOUNT YOU WANT TO DEPOSIT:");
scanf("%d",&list[i].amount);
}
}
void display(struct customer list[100],int s)
{
printf("\n NAME OF THE CUSTOMER=%s",list[s].cus_name) ;
printf("\n ACCOUNT NO.=%d",list[s].acc_no);
printf("\n BALANCE IN YOUR ACCOUNT=%d",list[s].amount);
}
void display_all(struct customer list[100],int t)
{
int i;
for(i=0;i<t;i++)
{
printf("\nRECORD NO.%d",i+1);
printf("\n NAME OF THE CUSTOMER=%s",list[i].cus_name);
printf("\n ACCOUNT NO.=%d",list[i].acc_no);
printf("\n BALANCE IN ACCOUNT=%d",list[i].amount);
}
}
void withdraw(struct customer list[100],int rno,int amo)
{
printf("\n ACCOUNT NO.=%d",list[rno].acc_no);
printf("\n NAME OF THE CUSTOMER=%s",list[rno].cus_name);
printf("\n BALANCE IN THE ACCOUNT=%d",list[rno].amount);
printf("\n AMOUNT TO BE WITHDRAWN=%d",amo);
list[rno].amount=list[rno].amount-amo;
printf("\n BALANCE LEFT AFTER WITHDRAWAL=%d",list[rno].amount);
}
void deposit(struct customer list[100],int rno,int amo)
{
printf("\n ACCOUNT NO.=%d",list[rno].acc_no);
printf("\n NAME OF THE CUSTOMER=%s",list[rno].cus_name);
printf("\n BALANCE IN THE ACCOUNT=%d",list[rno].amount);
printf("\n AMOUNT TO BE DEPOSITED=%d",amo);
list[rno].amount=list[rno].amount+amo;
printf("\n BALANCE AFTER DEPOSIT=%d",list[rno].amount);
}
void main()
{
struct customer data[100];
int d=0,i,k=-1,j,r,ch,ac,aw,ad,acw,acd;
printf("\nWELCOME TO ACCOUNT MANAGEMENT SYSTEM....");
printf("\n ACCOUNT CREATION...");
printf("\n ENTER NO. OF RECORDS=");
scanf("%d",&r);
accept(data,r);
printf("\nWELCOME TO ACCOUNT MANAGEMENT SYSTEM....");
printf("\nPLEASE CHOOSE YOUR OPTIONS:");
do
{
printf("\nENTER 1 TO DISPLAY DETAILS OF CUSTOMER... ");
printf("\nENTER 2 TO DISPLAY DETAILS OF ALL RECORDS... ");
printf("\nENTER 3 TO WITHDRAW MONEY... ");
printf("\nENTER 4 TO DEPOSIT MONEY... ");
printf("\nENTER 0 TO EXIT.....");
printf("\n ENTER YOUR CHOICE=");
scanf("%d",&ch);
switch(ch)
{
case 1:
printf(" \n DISPLAYING DETAILS.....");
printf("\n ENTER YOUR ACCOUNT NO.=");
scanf("%d",&ac);
for(i=0;i<r;i++)
{
if(data[i].acc_no==ac)
k=i;
}
if(k!=-1)
display(data,k);
else
printf("\n WRONG ACCOUNT NUMBER!!NO ACCOUNT FOUND ...TRY AGAIN OR  PRESS 0 TO EXIT");
break;
case 2:
printf("\n DISPLAYING DETAILS OF ALL THE RECORDS.....");
display_all(data,r);
break;
case 3:
k=-1;
printf("\n WELCOME TO AMOUNT WITHDRAWAL MENU.....");
printf("\n ENTER ACCOUNT NO.:");
scanf("%d",&acw);
printf("\n ENTER AMOUNT TO BE WITHDRAWN:");
scanf("%d",&aw);
for(i=0;i<r;i++)
{
if(data[i].acc_no==acw)
{
k=i;
if(data[i].amount>aw)
d=1;
}
}
if(k!=-1)
{
if(d==0)
{
printf("\n YOUR ACCOUNT DOES NOT HAVE THE SUFFICIENT BALANCE....");
display(data,k);
}
else
withdraw(data,k,aw);
}
else
printf("\n WRONG ACCOUNT NUMBER!!NO ACCOUNT FOUND ...TRY AGAIN OR  PRESS 0 TO EXIT");
break;
case 4:
k=-1;
printf("\n WELCOME TO AMOUNT DEPOSIT MENU.....");
printf("\n ENTER ACCOUNT NO.:");
scanf("%d",&acd);
printf("\n ENTER AMOUNT TO BE DEPOSITED:");
scanf("%d",&ad);
for(i=0;i<r;i++)
{
if(data[i].acc_no==acd)
{
k=i;
}
}
if(k!=-1)
deposit(data,k,ad);
else
printf("\n WRONG ACCOUNT NUMBER!!NO ACCOUNT FOUND ...TRY AGAIN OR  PRESS 0 TO EXIT");
break;
}
}
while(ch!=0);
getch();
}