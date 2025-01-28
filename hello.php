<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PARLOR MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="hello.css">


    <!-- yo fonts ho -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Fleur+De+Leah&family=Great+Vibes&family=Italianno&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>
<style>
    
    .page-6{
        height: 500px;
        background-image: url(./bg-03.jpg);
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    .page6p1,
    .page6p2,
    .page6p3,
    .page6btn {
        /* border: 2px solid black; */
        display: flex;
        justify-content: center;
        color: white;
    }
    
    .page-6 .page6p1 {
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-size: 18px;
        font-weight: 450;
        font-style: normal;
        letter-spacing: 2px;
    
    }
    
    .page-6 .page6p2 p .span1 {
        font-size: 5rem;
    }
        .page-6 .page6p2 p .span1 {
        font-size: 5rem;
    }
    
    .page-6 .page6p2 p .span2 {
        font-size: 6rem;
        font-weight: 700;
        font-family: 'Jost', sans-serif;
    }
    
    .page-6 .page6p2 {
        font-family: "Vollkorn", serif;
        font-weight: 400;
        font-style: normal;
    
    
    }
    
    .page-6 .page6p3 {
        position: relative;
        top: -50px;
        font-size: 3.5rem;
        font-family: "Vollkorn", serif;
        font-weight: 400;
        font-style: normal;
    
    }
    
    .page6btn button {
        position: relative;
        top: -50px;
        padding: 15px 30px 15px;
        color: aliceblue;
        background-color: transparent;
        border: 1px solid white;
        font-size: 0.9rem;
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-weight: 600;
        font-style: normal;
        letter-spacing: 2px;
    }
    
    .page6btn button:hover {
        background-color: white;
        color: black;
        transition: 0.7s;
    }
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    header {
        /* border: 1px solid green; */
        padding-top: 30px;
        display: flex;
        justify-content: center;
    }
    
    nav {
    
        /* border: 1px solid rgb(12, 103, 240); */
        display: grid;
        list-style-type: none;
        grid-template-columns: repeat(5, auto);
        padding-top: 15px;
        padding-bottom: 15px;
        margin: auto;
        position: relative;
        left: 100px;
    }
    
    nav li {
        padding-left: 15px;
            padding-right: 15px;
    }
#hi{
    position: relative;
    right:70px;
}    
#hello{
    position: relative;
    left:70px;
}
    nav li a {
        /* border: 1px solid rgb(255, 255, 255); */
        transition: 0.7s;
        text-decoration: none;
        color: rgb(255, 255, 255);
        padding: 10px 10px;
        border-radius: 20px;
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-style: normal;
        font-weight: 400;
        letter-spacing: 2px;
    }
    
    li a:hover {
        color: rgb(0, 0, 0);
        background-color: rgb(168, 152, 132);
    }
    .login {
        /* position: relative; */
        /* right: 100px; */
        /* top: 10px;    */
        /* border: 1px solid green; */
        color: rgb(205, 123, 30);
        list-style-type: none; 
    }
    .login a{
        color:rgb(45, 52, 148);
        /* background-color: rgb(58, 106, 148); */
        background-color: transparent;
        border: 1px solid white;
        
    }
    .login li a {
        /* border: 1px solid rgb(255, 255, 255); */
        transition: 0.7s;
        text-decoration: none;
        color: rgb(255, 255, 255);
        padding: 15px 20px;
        border-radius: 25px;
        font-style: normal;
        font-weight: 400;
        letter-spacing: 2px;
    }
    
    
    .main_photo {
        /* border: 2px solid red; */
        background-image: url(./1stimg.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 700px;
    }
    
    .main_photo .text1,
    .text2 {
        color: white;
        display: flex;
        justify-content: center;
        font-size: 5rem;
        font-family: "Vollkorn", serif;
        font-optical-sizing: auto;
        font-style: normal;
    }
    
    .main_photo .text {
        /* border: 1px solid rgb(255, 255, 255); */
        position: relative;
        top: 120px;
    }
    
    .main_photo .fade_text {
        /* border: 1px solid rgb(237, 33, 255); */
        display: flex;
        position: relative;
        top: -200px;
        justify-content: center;
        color: rgb(255, 255, 255);
        font-size: 13rem;
        opacity: 0.15;
        font-family: "Fleur De Leah", cursive;
        font-weight: 400;
        font-style: normal;
    }
    
    .main_photo .btn{
        /* margin: 60px auto 0; */
        display: flex;
        justify-content: center;
        position: relative;
        top: -100px;
    }
    .btn a{
        width: 250px;
        text-decoration: none;
        color: rgb(255, 255, 255);
        display: flex;
        justify-content: center;
        margin: 0 10px;
        font-size: 20px; 
        padding: 20px 0;
        border: 1px solid white;
        position: relative;
        z-index: 1;
        transition:color 0.5s;
        font-size: 0.85rem;
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-weight: 600;
        letter-spacing: 3px;
        font-style: normal;
    }
    .btn a span
     {
        width: 0%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background: white;
        z-index: -1;
        transition: 0.5s;
    }
    .btn a:hover span{
        width: 100%;
    }
    .btn a:hover {
        color: rgb(0, 0, 0);
        /* font-weight: bold; */
    }

/* Media Queries for Adjustments */
@media (max-width: 1024px) {
  .main_photo {
    background-size: contain; /* Fit the image inside the container */
    height: 80vh; /* Adjust height for tablets */
  }
}

@media (max-width: 768px) {
  .main_photo {
    background-size: cover; /* Ensure the image remains as a background */
    height: 70vh; /* Smaller height for mobile */
  }
}

@media (max-width: 480px) {
  .main_photo {
    background-size: cover; 
    height: 60vh; /* Optimized height for very small devices */
  }
}

    
    /* 2nd page starts here*/
    .page2 {
        /* border: 2px solid black; */
        flex-direction: column;
        display: flex;
    }
    
    .para1 p,
    .para2 p,
    .images p {
        /* border: 2px solid blue; */
        display: flex;
        justify-content: center;
    }
    
    .para1 p {
        padding-top: 100px;
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-style: normal;
        letter-spacing: 2px;
        font-weight: 500;
        color: rgb(104, 100, 100);
    }
    
    .para2p1 {
        font-size: 80px;
        opacity: 0.1;
        font-family: "Alex Brush", cursive;
    }
    
    .para2p2 {
        top: -90px;
        position: relative;
        font-size: 60px;
    }
    
    .para3p3 {
        position: relative;
        top: -50px;
        font-size: 20px;
        line-height: 30px;
        color: rgb(119, 119, 119);
    
    
    }
    
    .para2p2,
    .para3p3 {
        font-family: "Vollkorn", serif;
        font-optical-sizing: auto;
        font-style: normal;
    }
    
    .click
    
    /* .facial,.eyelash,.eyebrow,.waxing,.nails,.make-up */
        {
        margin-left: 40px;
        margin-right: 40px;
        display: flex;
        align-items: center;
        justify-content:space-evenly;
        gap: 2rem;
        margin-top: 5rem;
        /* border: 1px solid green; */
    }
    .click a{
        text-decoration: none;
    }
    .row {
    
        height: 130px;
        width: 130px;
        display: flex;
        justify-content: center;
        cursor: pointer;
    }
    
    .row img {
        /* border: 1px solid red; */
        width: 100%;
        border-radius: 8px;
        display: block;
        transition: transform 0.5s;
    }
    .row:hover img {
        transform: scale(1.5);
        
    
    }
    
    .row p {
        /* border: 1px solid rgb(93, 12, 109); */
        color: rgb(75, 75, 75);
        font-size: 20px;
        text-align: center;
        align-items: center;
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-weight: 500;
        letter-spacing: 2px;
        font-style: normal;
    }
    
    .page2button {
        display: flex;
        justify-content: center;
        padding-top: 80px;
        padding-bottom: 30px;
    
    }
    
    .page2button button {
        padding: 15px 40px 15px;
        color: rgb(0, 0, 0);
        background-color: transparent;
        border: 1px solid rgb(0, 0, 0);
        font-size: 0.85rem;
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-weight: 600;
        letter-spacing: 2px;
        font-style: normal;
    }
    
    .page2button button:hover {
        background-color: rgb(0, 0, 0);
        color: rgb(255, 255, 255);
        transition: 0.7s;
    }
    /*2nd page starts here*/
    
    
    /*3rd page starts here*/
    
    .page-3 .page3main {
        display: flex;
        justify-content: center;
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
        letter-spacing: 2px;
        color: rgb(104, 100, 100);
    }
    
    .page-3 h1 {
        display: flex;
        justify-content: center;
        font-size: 5rem;
        opacity: 0.15;
        font-family: "Alex Brush", cursive;
        font-weight: 400;
        font-style: normal;
    }
    
    .page-3 h2 {
        display: flex;
        font-size: 3.5rem;
        justify-content: center;
        position: relative;
        font-family: "Vollkorn", serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
        top: -60px;
    }
    /*3rd page ends here*/
    
    /*4th page starts here*/
    .page-4 .mainsection {
        position: relative;
        padding-top: 50px;
        padding-bottom: 50px;
        /* border: 2px solid rgb(255, 150, 150); */
        display: flex;
        justify-content: center;
    }
    
    .page-4 .mainsection .section1 {
        /* border: 2px solid blue; */
        padding-left: 20px;
        padding-right: 80px;
    }
    
    
    .page-4 .mainsection .p3-1stspan {
        position: relative;
        top: 50px;
        /* border: 2px solid black; */
        font-size: 15px;
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-style: normal;
        letter-spacing: 2px;
        font-weight: 500;
        color: rgb(104, 100, 100);
    }
    
    .page-4 .mainsection .section2 .p3-h1 {
        padding-top: 70px;
        font-size: 55px;
        font-family: "Vollkorn", serif;
        font-optical-sizing: auto;
        font-weight: 300;
        font-style: normal;
    }
    
    .page-4 .mainsection .section2 .page4p {
        padding-top: 50px;
    }
    
    .page-4 .mainsection .section2 .page4p,
    .page4p2,
    .page4p3 {
        font-family: "Vollkorn", serif;
        font-optical-sizing: auto;
        font-style: normal;
        font-weight: 600;
        font-size: 25px;
        line-height: 30px;
        color: rgb(0, 0, 0);
    }
    
    /*4th page ends here*/
    
    /*5th page starts here*/
    
    .page-5 .mainsection {
        /* position: relative; */
        /* width: 90%; */
        padding-top: 50px;
        padding-bottom: 50px;
        /* border: 2px solid rgb(255, 150, 150); */
        display: flex;
        justify-content: center;
    
    }
    
    .page-5 .mainsection .section1 {
        /* border: 2px solid blue; */
        width: 600px;
        position: relative;
        left: 20px;
        /* padding-left: 50px; */
        /* padding-left: 120px;  */
    }
    
    .page-5 .mainsection .section1 .p5-1stspan {
        font-family: "Jost", sans-serif;
        /* font-optical-sizing: auto; */
        font-style: normal;
        letter-spacing: 2px;
        font-weight: 500;
        color: rgb(104, 100, 100);
    }
    
    .page-5 .mainsection .section1 .p5-h1 {
        padding-top: 25px;
        font-family: "Vollkorn", serif;
        font-size: 55px;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
        /* border: 2px solid black; */
    }
    
    .page-5 .mainsection .section1 .page5p {
        font-family: "Vollkorn", serif;
        font-optical-sizing: auto;
        font-style: normal;
        text-align: justify;
        font-size: 20px;
        line-height: 30px;
        padding-right: 20px;
        padding-top: 20px;
        color: rgb(104, 100, 100);
    }
    
    .page-5 .mainsection .section2 {
        /* border: 2px solid black; */
        width: 600px;
        padding-left: 100px;
        padding-top: 30px;
        position: relative;
        left: 20px;
        font-size: 23px;
        /* padding-left: 100px; */
    }
    
    .page-5 .mainsection .section2 .p3-span {
        /* border: 2px solid black; */
        font-family: "Vollkorn", serif;
        font-style: normal;
    }
    
    .page-5 .mainsection .section2 .p3-2ndspan {
        font-family: "Vollkorn", serif;
        font-style: normal;
    }
    
    .page-5 .mainsection .section2 .page5p,
    .page5p2 {
        font-family: "Vollkorn", serif;
        font-style: normal;
        color: rgb(0, 0, 0);
    }
    
    .page-5 .mainsection .section2 .dotted {
        border: none;
        border-top: 2px dotted #000;
        margin-top: 5px;
    }
    
    /*5th page ends here*/
    
    /*7th page starts here*/
    
    .page-7 .page7-main .section1 .page7header p,
    .h2-1st,
    .secondh2 {
        display: flex;
        justify-content: center;
    }
    
    .page-7 .page7-main .section1 .page7header p {
        padding-top: 50px;
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-weight: 600;
        font-style: normal;
        letter-spacing: 2px;
        color: rgb(104, 100, 100);
    }
    
    .page-7 .page7-main .section1 .h2-1st {
        font-size: 5rem;
        opacity: 0.15;
        font-family: "Alex Brush", cursive;
        font-weight: 400;
        font-style: normal;
    }
    
    .page-7 .page7-main .section1 .secondh2 {
        position: relative;
        top: -65px;
        font-family: "Vollkorn", serif;
        font-weight: 400;
        font-size: 3.8rem;
        font-style: normal;
    }
    .page-7 .page7-main .container{
        display: flex;
        justify-content: center;
        padding-bottom: 100px;
    }
    
    
    .page-7 .page7-main .container .section2 .img1 .p1,
    .page-7 .page7-main .container .section3 .img2 .p1,
    .page-7 .page7-main .container .section4 .img3 .p1 {
    
    
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
        letter-spacing: 2px;
        color: rgb(104, 100, 100);
        padding-top: 30px;
    
    }
    
    .page-7 .page7-main .container .section2 .img1 .p2,
    .page-7 .page7-main .container .section3 .img2 .p2,
    .page-7 .page7-main .container .section4 .img3 .p2 {
    
        font-family: "Vollkorn", serif;
        font-weight: 400;
        line-height: 35px;
        font-size: 1.7rem;
    
    }
    
    .page-7 .page7-main .container .section2 .img1 .p3,
    .page-7 .page7-main .container .section3 .img2 .p3,
    .page-7 .page7-main .container .section4 .img3 .p3 {
    
        font-family: "Vollkorn", serif;
        font-optical-sizing: auto;
        font-style: normal;
        font-size: 19px;
        line-height: 30px;
        color: rgb(104, 100, 100);
    
    }
    .page-7 .page7-main .container .section4{
        padding-left: 25px;
    }
    .page-7 .page7-main .container .section3{
        padding-left: 25px;
    }
    /*7th page ends here*/
    
    
    /*8th page starts here*/

    .page-8 .container{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    
    .page-8 .container .section1 .page8header p {
        display: flex;
        justify-content: center;
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-weight: 600;
        font-style: normal;
        letter-spacing: 2px;
        color: rgb(104, 100, 100);
    }
    .page-8 .container .section1 .h2-page8 {
        display: flex;
        justify-content: center;
        font-family: "Vollkorn", serif;
        font-weight: 400;
        font-size: 3.7rem;
        font-style: normal;
        padding-top: 10px;
    }
    .page-8 .container .section1 {
        padding-bottom: 50px;
    }
    .page-8 .container .section2{
        display: flex;
        justify-content: space-evenly;
    }
    .page-8 .container .section2 .img1 h5,
    .page-8 .container .section2 .img2 h5 {
        font-family: "Vollkorn", serif;
        font-style: normal;
        padding-top: 50px;
        display: flex;
        justify-content: center;
        font-weight: 500;
        font-size: 2rem;
    }
    .page-8 .container{
        padding-bottom: 50px;
    }
    @media (max-width: 768px) {
  .h2-page8 {
    font-size: 1.5rem;
  }
  .section2 .img1, 
  .section2 .img2 {
    flex: 1 1 100%; /* Stack images on top of each other */
  }
  .section2 h5 {
    font-size: 0.9rem;
  }
}

@media (max-width: 480px) {
  .page8header p {
    font-size: 1rem;
  }
  .h2-page8 {
    font-size: 1.2rem;
  }
  .section2 h5 {
    font-size: 0.8rem;
  }
}
    /*8th page ends here*/
    
    
    /*9th page starts here*/
    
    .page-9 .container{
        display: flex;
        justify-content: center;
        padding-bottom: 20px;
        justify-content: space-evenly;
    }
    
    .page-9 .container .section3 button{
        padding: 20px 40px 20px;
        color: aliceblue;
        background-color: black;
        border: #000;
        font-size: 0.9rem;
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-weight: 600;
        font-style: normal;
        letter-spacing: 2px;
    }
    .page-9  .section3 input{
    
        padding: 15px 20px 20px;
        color: rgb(0, 0, 0);
        background-color: rgb(255, 255, 255);
        font-size: 1rem;
        border: 1px solid rgb(160, 160, 160);
    }
    
    
    .page-9 .container .section3 button:hover {
        background-color: white;
        color: black;
        transition: 0.7s;
        border: 1px solid black;
        overflow: hidden;
    }
    
    .page-9 .container .section1 h2,
    .page-9 .container .section2 h2,
    .page-9 .container .section3 h2 {
    
        font-family: "Vollkorn", serif;
        font-weight: 400;
        font-style: normal;
        padding-bottom: 25px;
    
    }
    
    .page-9 .container .section1 .p1,
    .p2 {
        font-family: "Vollkorn", serif;
        font-style: normal;
        font-size: 20px;
        color: rgb(104, 100, 100);
    }
    
    .page-9 .container .section2 .p4,
    .p5,
    .p6
    {
        font-family: "Vollkorn", serif;
        font-style: normal;
        font-size: 20px;
        padding-right: 20px;
        color: rgb(104, 100, 100);
    }
    .page-9 .container .section2 .p7{
        
        font-family: "Vollkorn", serif;
        font-weight: 600;
        font-size: 25px;
        padding-top: 20px;
       
    
    }
    
    .page-9 .container .section3 .p8{
        font-family: "Vollkorn", serif;
        font-style: normal;
        font-size: 20px;
        padding-right: 20px;
        color: rgb(104, 100, 100);
    }
    
    /*9th page ends here*/
    
    /* Footer-Start */
    
    
    footer {
        display: flex;
        background-color: black;
        color: aliceblue;
        justify-content: center;
        padding-top: 30px;
        padding-bottom: 20px;
    }
    
    
    /* Footer-End */
    
    
    /* responsive is here */
    
        
    .page-6{
        height: 500px;
        background-image: url(./bg-03.jpg);
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    .page6p1,
    .page6p2,
    .page6p3,
    .page6btn {
        /* border: 2px solid black; */
        display: flex;
        justify-content: center;
        color: white;
    }
    
    .page-6 .page6p1 {
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-size: 18px;
        font-weight: 450;
        font-style: normal;
        letter-spacing: 2px;
    
    }
    
    .page-6 .page6p2 p .span1 {
        font-size: 5rem;
    }
        .page-6 .page6p2 p .span1 {
        font-size: 5rem;
    }
    
    .page-6 .page6p2 p .span2 {
        font-size: 6rem;
        font-weight: 700;
        font-family: 'Jost', sans-serif;
    }
    
    .page-6 .page6p2 {
        font-family: "Vollkorn", serif;
        font-weight: 400;
        font-style: normal;
    
    
    }
    
    .page-6 .page6p3 {
        position: relative;
        top: -50px;
        font-size: 3.5rem;
        font-family: "Vollkorn", serif;
        font-weight: 400;
        font-style: normal;
    
    }
    
    .page6btn button {
        position: relative;
        top: -50px;
        padding: 15px 30px 15px;
        color: aliceblue;
        background-color: transparent;
        border: 1px solid white;
        font-size: 0.9rem;
        font-family: "Jost", sans-serif;
        font-optical-sizing: auto;
        font-weight: 600;
        font-style: normal;
        letter-spacing: 2px;
    }
    
    .page6btn button:hover {
        background-color: white;
        color: black;
        transition: 0.7s;
    }
    #hi{
        position: relative;
        top: 18px;
    }
    </style>


<body>



    <!-- 1st page -->
    <div class="main_photo">
        <header>
            <!-- <div class="logo">
           <span> Mero Parlor'S</span> 
           <span class="beauty"> BEAUTY</span> <span class="salon"> SALON</span>        </div> -->
            <nav class="nav" id="nav">
                <li><a href="#active">HOME</a></li>
                <li><a href="hellomenu.php">MENU</a></li>
                <li><a href="helloservice.php">OUR SERVICES</a></li>
                <li><a href="helloabout.php">ABOUT US</a></li>
                <li><a href="hellocontact.php">CONTACT US</a></li>
            </nav>
            <div class="login" id="hi">
                <li><a href="./mainlogin.php">LOGIN/REGISTER</a></li>
            </div>
        </header>
        <div class="main">
            <div class="text">
                <div class="text1">
                    Unleash your beauty
                </div>
                <div class="text2">
                    with Mero Parlor
                </div>
            </div>
        </div>
        <div class="fade_text">
            Naturally You
        </div>
        <div class="btn">
            <a href="mainlogin.php"><span></span>GET MEMBERSHIP</a>
        </div>
    </div>
    <!-- 1st page ends here -->


    <!-- 2nd page starts here -->
    <div class="page2">
        <div class="para1">
            <p>INDULGE YOURSELF</p>
        </div>
        <div class="para2">
            <p class="para2p1">Come Relax and Enjoy</p>
            <p class="para2p2">Your secrate Place of Beauty</p>
            <p class="para3p3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum consequatur nobis
                adipisci similique <br>
                consectetur tempora, quidem veritatis eaque iure voluptates, modi delectus reprehenderit officiis fugit?
            </p>
        </div>
        <div class="click">
        <div class="row">
            <a href="">
                    <img src="./IMAGES/2nd page imgs/New folder/facial.png" alt="" height="100px" width="100px">
                    <p>FACIAL</p>
                </a>
                
            </div>
            
            <div class="row">
                <a href="">
                    <img src="./IMAGES/2nd page imgs/New folder/Eyelash.png" alt="" height="100px" width="100px">
                    <p>EYELASH</p>
                </a>
            </div>
            <div class="row">
                <a href="">
                    <img src="./IMAGES/2nd page imgs/New folder/eyebrow.png" alt="" height="100px" width="100px">
                    <p>EYEBROW</p>
                </a>
            </div>
            <div class="row">
                <a href="">
                    <img src="./IMAGES/2nd page imgs/New folder/Waxing.png" alt="" height="100px" width="100px">
                    <p>WAXING</p>
                </a>
            </div>
            <div class="row">
                <a href="https://www.youtube.com/">
                    
                    <img src="./IMAGES/2nd page imgs/New folder/Nails.png" alt="" height="100px" width="100px">
                    <p>NAILS</p>
                </a>
            </div>
            <div class="row">
                <a href="">
                    <img src="./IMAGES/2nd page imgs/New folder/Make-up.png" alt="" height="100px" width="100px">
                    <p>MAKE-UP</p>
                </a>
            </div>
        </div>  
        <div class="page2button">
           <a href="about.htm">
        <button>VIEW OUR MENU</button>
    </a> 
               
        </div>
    </div>
    <!-- 2nd page ends here -->

    <!-- 3rd page starts here-->

    <div class="page-3">
        <div class="page3main">
            <p>BE A MORE PERFECT</p>
        </div>
        <h1>A Whole New You</h1>
        <h2>Redefine Your Beauty</h2>
    </div>
    <!-- 3rd page ends here-->

    <!-- 4th page starts here-->
    <div class="page-4">
        <div class="mainsection">
            <div class="section1">
                <div class="section2photo">
                    <img src="./IMAGES/bg9.jpg" alt="9th page photo" height="570px" width="570px">
                </div>
            </div>
            <div class="bgpage3">

            </div>
            <div class="section2">
                <span class="p3-1stspan">
                    TIME TO BE BEAUTIFUL
                </span>
                <h1 class="p3-h1">
                    Give the pleasure of <br>beautiful to yourself
                </h1>
                <p class="page4p">
                    Certified stylists
                    <hr>
                </p>
                <p class="page4p2">
                    100% Organic Cosmetics
                    <hr>
                </p>
                <p class="page4p3">
                    Online Booking
                    <hr>
                </p>
            </div>
        </div>
    </div>

    <!-- 4th page ends here-->

    <!-- 5th page starts here-->


    <div class="page-5">
        <div class="mainsection  ">
            <div class="section1">
                <span class="p5-1stspan">
                    TIME SCHEDULE
                </span>
                <h1 class="p5-h1">
                    Working Hours
                </h1>
                <p class="page5p ">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod vitae maiores minus ipsam inventore
                    voluptatum, debitis quas impedit. Eum ipsam magni architecto nulla tempore culpaunde praesentium
                    quisquam
                    laboriosam, ullam suscipit vero itaque,
                    deserunt doloremque dolores!
                </p>
            </div>
            <div class="section2  ">
                <p class="p3-span">
                    Mon-Wed - <b>10:00AM - 9:00PM</b>
                    <hr class="dotted">
                </p>
                <p class="p3-2ndspan">
                    Thursday - <b>10:00AM - 7:30PM</b>
                    <hr class="dotted">
                </p>
                <p class="page5p">
                    Friday - <b>10:00AM - 9:00PM</b>
                    <hr class="dotted">
                </p>
                <p class="page5p2">
                    Sat-Sun - <b>10:00AM - 5:00PM</b>
                </p>
            </div>
        </div>
    </div>
    <!-- 5th page ends here-->

    <!-- 6th page starts here-->
    <div class="page-6">

<div class="page6p1">
    <p>ON 1st MEMBERSHIP WEEK </p>
</div>
<div class="page6p2">
    <p> <span class="span1">Get </span> <span class="span2">30% OFF</span></p>
</div>
<div class="page6p3">
    <p>Quick Face Makeup</p>
</div>

<div class="page6btn">
    <button id="book-button" onclick="window.location.href='mainlogin.php';">BOOK AN APPOINTMENT</button>
</div>


</div>
    <!-- 6th page ends here-->

    <!-- 7th page starts here-->

    <div class="page-7">
        <div class="page7-main">
            <div class="section1">
                <div class="page7header">
                    <p>FROM THE BLOG</p>
                </div>
                <h2 class="h2-1st">Being Beautiful </h2>
                <h2 class="secondh2">Our Latest News</h2>
            </div>
            <div class="container">
            <div class="section2" >
                <div class="img1">
                    <img src="./IMAGES/page7/img-01.jpg" alt="" height="264px" width="352px" >
                    <p class="p1">
                        NEWS | AUGUST 03, 2023
                    </p>
                    <p class="p2">
                        Quaerat sodales sapien and <br>tempor  diam euismod purus
                    </p>
                    <p class="p3">
                        Velna purus purus magna ipsum suscipit egestas magna aliquam ipsum vitae...
                    </p>
                </div>
            </div>
                <div class="section3">
                    <div class="img2">
                        <img src="./IMAGES/page7/img-02.jpg" alt="" height="352px" width="352px">
                        <p class="p1">
                            TRENDS | JULY 31, 2023
                        </p>
                        <p class="p2">
                            Luctus vitae and egestas
                        </p>
                        <p class="p3">
                            Congue augue sagittis egestas integer velna purus purus magna suscipit...
                        </p>
                    </div>
            </div>
                <div class="section4">
                    <div class="img3">
                        <img src="./IMAGES/page7/img-03.jpg" alt="" height="264px" width="352px">
                        <p class="p1">
                            TREATMENT | JULY 18, 2023
                        </p>
                        <p class="p2">
                            Magna aliquam ipsum a vitae purus justo lacus ligulas
                        </p>
                        <p class="p3">
                            Congue augue sagittis egestas integer velna purus and magna ipsum suscipit...
                        </p>
                    </div>
                </div>
            </div>
          
        </div>

    </div>
    <!-- 7th page ends here-->

    <!-- 8th page starts here-->
    <div class="page-8">
        <div class="container">
            <div class="section1">
                <div class="page8header">
                    <p>OUR LOCATON</p>
                </div>
                <h2 class="h2-page8">Welcome to Parlor </h2>
            </div>
            <div class="section2">
                <div class="img1">
                    <img src="./IMAGES/page8/salon_02.jpg" alt="" height="339px" width="542px">
                    <h5>New Baneshwor</h5>
                </div>            
                <div class="img2">
                    <img src="./IMAGES/page8/salon_03.jpg" alt="" height="339px" width="542px">
                    <h5>New Baneshwor</h5>
                </div>            
            </div>

        </div>
    </div>
    <!-- 8th page ends here-->

    <!-- 9th page starts here-->
<div class="page-9">
    <div class="container">
        <div class="section1 ">
            <h2>Get in Touch</h2>
            <p class="p1">
                Baneshwor, <br>
                Eyeplex, Gully
            </p>
            <p class="p2">
                phone: 9800000000 <br>
                Mero Parlor@gmail.com
            </p>
        </div>
        <div class="section2">
            <h2>Working Hours</h2>
            <p class="p4"> Sun-Sat: 08:00AM - 08:00PM</p>
            <p class="p7">BOOK A SERVICE</p>
        </div>
        <div class="section3">
            <h2>Stay in the Know</h2>
            <p class="p8">
                Subscribe our mailing list and be the first to know <br>about special deals!
            </p>
        </div>

    </div>
</div>
    <!-- 9th page ends here-->

    <!-- yo footer ho -->
    <footer>
        <div class="footerp">
            <p> &copy; Mero Parlor. All Rights Reserve</p>
        </div>
        <!-- <li style="list-style: none; "><a href="./logout.php" style="color: white; text-decoration: none;">LOGOUT</a></li> -->

    </footer>
    <!-- yaha footer sakeyo -->

   
</body>

</html>