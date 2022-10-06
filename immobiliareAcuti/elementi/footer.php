<footer class="footer-distributed">
        <div class="container">
        <div class="footer-right">
            <h5 id="github">Social:</h5>
            <a href="https://github.com/acuti03" target="_blank"><i class="fa fa-github"></i></a>
            <a href="https://www.instagram.com/simoneacuti/" target="_blank"><i class="fa fa-instagram"></i></a>
        </div>
        <div class="footer-left">
            <p class="footer-links">
                <a class="link-1" href="index.php">Home</a>
                <a href="proprietario.php?sc=listaProp">Proprietari</a>
                <a href="immobili.php?sc=listaImm">Immobili</a>
                <a href="zone.php?sc=lista">Zone & Tipologie</a>
            </p>
            <p>Acuti spa &copy; 2022</p>
        </div>
</footer>

<style>
    .footer-distributed {
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
        box-sizing: border-box;
        width: 100%;
        text-align: left;
        font-size: 18px;
        padding: 45px 50px;
        border-top-right-radius: 20px;
        border-top-left-radius: 20px;
        margin-top: 450px;
        border: 1px solid #e7e7e7;
        background: #f6f8fa;
    }

    .footer-distributed .footer-left p {
        font-size: 14px;
        margin: 0;
    }

    .footer-distributed p.footer-links {
        font-size: 18px;
        font-weight: bold;
        margin: 0 0 10px;
        padding: 0;
        transition: ease .25s;
    }

    .footer-distributed p.footer-links a {
        display: inline-block;
        line-height: 1.8;
        text-decoration: none;
        color: inherit;
        transition: ease .25s;
    }

    .footer-distributed .footer-links a:before {
        content: "·";
        font-size: 20px;
        left: 0;
        display: inline-block;
        padding-right: 5px;
    }

    .footer-distributed .footer-links .link-1:before {
        content: none;
    }

    .footer-distributed .footer-right {
        float: right;
        margin-top: 6px;
        max-width: 180px;
    }

    .footer-distributed .footer-right a {
        display: inline-block;
        width: 35px;
        height: 35px;
        border-radius: 2px;
        text-align: center;
        line-height: 35px;
        margin-left: 3px;
        transition:all .25s;
        font-size: 30px;
        color: #000;
    }
    .footer-right h5{
        font-weight: bold;
    }
    .footer-distributed .footer-right a:hover{transform:scale(1.1); -webkit-transform:scale(1.1);}

    .footer-distributed p.footer-links a:hover{text-decoration:underline;}
</style>