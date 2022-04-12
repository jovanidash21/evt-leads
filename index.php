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

      body {
        font-size: 16px;
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

      ul {
        padding-left: 0;
        list-style-type: none;
        margin: 0.5rem 0 1rem 0;
        border: 1px solid #e0e0e0;
        border-radius: 2px;
        overflow: hidden;
        position: relative;
      }

      li {
        background-color: #fff;
        line-height: 1.5rem;
        padding: 10px 20px;
        margin: 0;
        border-bottom: 1px solid #e0e0e0;
        padding-left: 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
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

    <div class="mui--appbar-height"></div>

    <div id="content-wrapper" class="mui-container">
      <div class="mui--text-center">
        <br>
        <br>
        <div class="mui--text-display3">EVT Leads</div>
        <br>
        <br>
        <button class="mui-btn mui-btn--raised mui-btn--primary"
                onclick="myFacebookLogin()"
        >
          Login with Facebook
        </button>
      </div>
      <br>
      <br>
      <div id="facebook-pages-list-panel" class="mui-panel" style="display: none;">
        <ul id="facebook-pages-list"></ul>
      </div>
    </div>

    <footer>
      <div class="mui-container mui--text-center">
        © <?php echo date( 'Y' ); ?> Event Hospitality & Entertainment Limited
      </div>
    </footer>

    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId  : '5030245583721224',
          xfbml  : true,
          version: 'v13.0'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));

      function subscribeApp(page_id, page_access_token) {
        console.log('Subscribing page to app! ' + page_id);
        FB.api(
          '/' + page_id + '/subscribed_apps',
          'post',
          {access_token: page_access_token, subscribed_fields: ['leadgen']},
          function(response) {
            console.log('Successfully subscribed page', response);
          }
        );
      }

      // Only works after `FB.init` is called
      function myFacebookLogin() {
        FB.login(function(response){
          console.log('Successfully logged in', response);
          FB.api('/me/accounts', function(response) {
            console.log('Successfully retrieved pages', response);

            document.getElementById('facebook-pages-list-panel').style.display = 'block';

            var pages = response.data;
            var ul = document.getElementById('facebook-pages-list');
            for (var i = 0, len = pages.length; i < len; i++) {
              var page = pages[i];
              var li = document.createElement('li');
              var a = document.createElement('a');
              a.href = "#";
              a.class = 'mui-btn mui-btn--flat mui-btn--primary';
              a.onclick = subscribeApp.bind(this, page.id, page.access_token);
              a.innerHTML = 'Subscribe';
              li.appendChild(page.name);
              li.appendChild(a);
              ul.appendChild(li);
            }
          });
        }, {scope: ['pages_show_list', 'leads_retrieval']});
      }
    </script>
  </body>
</html>
