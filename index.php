<!doctype html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EVT Leads</title>
    <link href="//cdn.muicss.com/mui-0.10.3/css/mui.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-0.10.3/js/mui.min.js"></script>
    <style>
      /**
       * Body CSS
       */
      html,
      body {
        height: 100%;
      }

      html,
      body,
      input,
      textarea,
      button {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
      }

      /**
       * Header CSS
       */
      header {
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        z-index: 2;
      }

      header ul.mui-list--inline {
        margin-bottom: 0;
      }

      header a {
        color: white;
      }

      header table {
        width: 100%;
      }

      /**
       * Content CSS
       */
      #content-wrapper {
        min-height: 100%;

        /* sticky footer */
        box-sizing: border-box;
        margin-bottom: -100px;
        padding-bottom: 100px;
      }

      /**
       * Footer CSS
       */
      footer {
        box-sizing: border-box;
        height: 100px;
        background-color: #eee;
        border-top: 1px solid #e0e0e0;
        padding-top: 35px;
      }
    </style>
  </head>
  <body>
    <header class="mui-appbar mui--z1">
      <div class="mui-container">
        <table>
          <tr class="mui--appbar-height">
            <td class="mui--text-title">EVT Leads</td>
            <td class="mui--text-right">
              <ul class="mui-list--inline mui--text-body2">
                <li><a href="#">About</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Login</a></li>
              </ul>
            </td>
          </tr>
        </table>
      </div>
    </header>
    <div id="content-wrapper" class="mui--text-center">
      <div class="mui--appbar-height"></div>
      <br>
      <br>
      <div class="mui--text-display3">EVT Leads</div>
      <br>
      <br>
      <button class="mui-btn mui-btn--raised">Get started</button>
    </div>
    <footer>
      <div class="mui-container mui--text-center">
        © <?php echo date( 'Y' ); ?> Event Hospitality & Entertainment Limited
      </div>
    </footer>
  </body>
</html>
