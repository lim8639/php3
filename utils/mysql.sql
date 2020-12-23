select * from tab_modity;
use myphp;

select * from tab_user;

show tables ;
# 商品表
select * from tab_modity;

select * from tab_modity where moditynum = 1001;

# 购物车
select * from tab_shop where customernum =1013;
select count(customernum) from tab_shop where customernum =1013;

delete from tab_shop where customernum =777 and moditynum =99;
delete from tab_shop where customernum =999;

INSERT INTO tab_shop
    (customernum, moditynum, modityname, picture, shopnum)
    VALUES (1013, 1010, '葡萄干', 'hioas', 1);


select * from tab_modity where moditynum in
  (select moditynum from tab_shop where customernum=1008);

select  * from tab_address;

select * from  tab_order;

delete  from tab_shop where customernum >1;

select * from  tab_shop
    left join  tab_modity
        on tab_modity.moditynum = tab_shop.moditynum
            where tab_shop.moditynum =10;

select * from tab_user where customernum =1013;

SELECT * FROM tab_address;

## 插入地址表
INSERT INTO tab_address  ( datailaddress, name, phonenumber, remarks, customernum)
VALUES ('广西南宁市江南区白沙大道波尔多庄园','陌上花开','10086','请送货上门哦',2006);

select  * from  tab_shop where  customernum = (
    select customernum from tab_user where account =666
 );

select * from  tab_modity where moditynum  in
       (select  moditynum from tab_shop where customernum = '2006');



select * from tab_modity left join tab_shop on tab_shop.moditynum = tab_modity.moditynum where tab_shop.customernum = 2006;



SELECT * FROM tab_order;

select moditynum from tab_shop where customernum = 1013;

show tables;



select  oid  from tab_book where ordertime = '';


select addressnum FROM tab_address where customernum =1013 and addressnum =?;

delete from tab_address where addressnum =2;
select  * from tab_book;


select * from tab_user;
select oid from tab_book where ordertime =? and customernum =?;


INSERT INTO tab_book (ordertime, status, customernum,addressnum) values ('2020-12-18 20:20:22',1,1013,100);


## 2006 测试 666

select * from tab_address;



select * from tab_book;

select * from tab_modity;

INSERT INTO tab_mo (oid, mid) VALUES (3,1);



delete from tab_book where customernum =2006;

INSERT INTO tab_mo (oid, mid) VALUES (22,1018);
INSERT INTO tab_mo (oid, mid) VALUES (22,1018);
select *from tab_shop;
select * from tab_mo;
select * from tab_book;
delete from tab_mo where oid =24;
INSERT INTO tab_mo (oid, mid) VALUES (21,1012);
INSERT INTO tab_mo (oid, mid) VALUES (21,1011);
INSERT INTO tab_mo (oid, mid) VALUES (21,1014);
INSERT INTO tab_mo (oid, mid) VALUES (21,1018);


## 订单表操作
## 1. 一个订单一个book
select * from tab_book;

## 一个订单对于多个商品changeRecord($conn,$sql11)
select * from tab_mo where oid =25;

## 通过订单号查询包含的商品
select  * from tab_modity where moditynum in
                                (select mid from tab_mo where oid = 25);

# 用戶表操作
# 加入表
INSERT INTO tab_address (datailaddress, name, phonenumber, remarks, customernum)
 VALUES ('dada','dada','3242','dasas','1013');
#查找表
select * from tab_book;
select  * from  tab_address where customernum = 2006;
select * from tab_book;
# hello world
select * from tab_address;

drop table tab_book;

create table tab_book
(
    oid         int(10) auto_increment
        primary key,
    ordertime   varchar(30) not null,
    status      int(10)     not null,
    customernum int(10)     not null,
    addressnum  int(20)     not null,
    foreign key (customernum)references tab_user(customernum),
    foreign key (addressnum)references tab_address(addressnum)
);


create table tab_mo(
                       oid int,
                       mid int,
                       foreign key(mid)references tab_modity(moditynum),
                       foreign key(oid)references tab_book(oid)
);


show tables;

drop table  if exists table_booknum;

select * from tab_user2;


