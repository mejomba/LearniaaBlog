const staticCacheName = "site-static-v1";
const cacheAssets = [
  "/",
  "/500",
  "/academy/detail/",
  "/academy/show/",
 "/academy/road/",
  "/academy/mylearn/",
 "/academy/course/",
  "/academy/saveprofile/",
 "/academy/roadmap/",
  "/academy/quicklearn/",
 "/package/pay/",
  "/Transaction/store/",
  "/Transaction/show/",
  "/mail/",
  "/assist/",
 "/search/",
  "/Contactus/",
 "/PrivacyPolicy/",
  "/TermsOfService/",
 "/Aboutus/",
  "/sitemap/",
 "/blog/",
  "/behavior/store/",
 "/category/show/",
  "/resetpassword/",
 "/reset/store/",
  "/reset/show/",
"/reset/update/",
 "/registerconfirm/",
  "/reset/delete/",
 "/reset/callbacklogin/",
  "/reset/showcallbackloginform/",
 "/message/store/",
 "/message/newspaper/",
  "/message/newspaperMobile/",
 "/login/google/",
"/login/google/callback/",
 "/user/home/index/",
  "/user/home/dashboard",
 "/user/Profile/edit/",
  "/user/Profile/update/",
"/user/learner/edit/",
 "/user/learner/update/",
  "/user/Transaction/index/",
"/user/Transaction/create/",
"/user/Transaction/store/",
"/user/Transaction/show/",
"/user/Transaction/addwalletmoney/",
"/user/Transaction/checkcallbackwalletmoney/",
"/user/Transaction/packagelist/",
 "/user/ReportVotes/store/",
  "/user/Notification/create/",
"/user/Notification/store/",
"/user/Notification/edit/",
"/user/Notification/update/",
 "/user/vote/index/",
"/user/vote/show/",
 "/user/vote/store/",
  "/css/site/bootstrap/bootstrap.css",
  "/css/site/myStyle.css",
  "/css/site/myStyle.css",
  "/css/site/slick.css",
  "/js/materialize.min.js",
  "/css/site/slick-theme.css",
  "/js/core/jquery.min.js",
  "/js/core/bootstrap.min.js",
  "/js/core/slick.min.js",
  "/js/videoplayer/afterglow.min.js",
  "/js/materialize.min.js",
  "/css/site/slick-theme.css",
  "./pages/fallback.html"
];

self.addEventListener("install", evt => {
  evt.waitUntil(
    caches
      .open(staticCacheName)
      .then(cache => {
        console.log("caching assets...");
        cache.addAll(cacheAssets);
      })
      .catch(err => {})
  );
});

self.addEventListener("fetch", evt => {
  evt.respondWith(
    caches
      .match(evt.request)
      .then(res => {
        return res || fetch(evt.request);
      })
      .catch(err => {
        if (evt.request.url.indexOf(".html") > -1) {
          return caches.match("./pages/fallback.html");
        }
      })
  );
});