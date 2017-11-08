<style type="text/css">
* {
        margin:0px;
        padding:0px;
      }

      #header {
        width: 100%;
        background: #ABA49F;
        list-style-type: none;
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      ul, ol {
        list-style:none;
      }

      .nav > li {
        float:left;
      }

      .nav li a {
        background-color:#ABA49F;
        color:#fff;
        text-decoration:none;
        padding:10px 100px;/*manejar el ancho del menu*/
        display: block;
        margin: 5px;
      }

      .nav li a:hover {
        background-color:#434343;
      }

      .nav li ul {
        display:none;
        position:absolute;
        min-width:100px;
      }

      .nav li:hover > ul {
        display:block;
      }

      .nav li ul li {
        position:relative;
      }

      .nav li ul li ul {
        right:-100px;
        top:0px;
      }

    </style>
