var staticCacheName = "LearniaaWPA";
var cacheAssets = [
  "https://learniaa.com/index.php",
  "https://learniaa.com/500",
  "https://learniaa.com/academy/detail/",
  "https://learniaa.com/academy/show/",
 "https://learniaa.com/academy/road/",
  "https://learniaa.com/academy/mylearn/",
 "https://learniaa.com/academy/course/",
  "https://learniaa.com/academy/saveprofile/",
 "https://learniaa.com/academy/roadmap/",
  "https://learniaa.com/academy/quicklearn/",
 "https://learniaa.com/package/pay/",
  "https://learniaa.com/Transaction/store/",
  "https://learniaa.com/Transaction/show/",
  "https://learniaa.com/mail/",
  "https://learniaa.com/assist/",
 "https://learniaa.com/search/",
  "https://learniaa.com/Contactus/",
 "https://learniaa.com/PrivacyPolicy/",
  "https://learniaa.com/TermsOfService/",
 "https://learniaa.com/Aboutus/",
  "https://learniaa.com/sitemap/",
 "https://learniaa.com/blog/",
  "https://learniaa.com/behavior/store/",
 "https://learniaa.com/category/show/",
  "https://learniaa.com/resetpassword/",
 "https://learniaa.com/reset/store/",
  "https://learniaa.com/reset/show/",
"https://learniaa.com/reset/update/",
 "https://learniaa.com/registerconfirm/",
  "https://learniaa.com/reset/delete/",
 "https://learniaa.com/reset/callbacklogin/",
  "https://learniaa.com/reset/showcallbackloginform/",
 "https://learniaa.com/message/store/",
 "https://learniaa.com/message/newspaper/",
  "https://learniaa.com/message/newspaperMobile/",
 "https://learniaa.com/login/google/",
"https://learniaa.com/login/google/callback/",
 "https://learniaa.com/user/home/index/",
  "https://learniaa.com/user/home/dashboard",
 "https://learniaa.com/user/Profile/edit/",
  "https://learniaa.com/user/Profile/update/",
"https://learniaa.com/user/learner/edit/",
 "https://learniaa.com/user/learner/update/",
  "https://learniaa.com/user/Transaction/index/",
"https://learniaa.com/user/Transaction/create/",
"https://learniaa.com/user/Transaction/store/",
"https://learniaa.com/user/Transaction/show/",
"https://learniaa.com/user/Transaction/addwalletmoney/",
"https://learniaa.com/user/Transaction/checkcallbackwalletmoney/",
"https://learniaa.com/user/Transaction/packagelist/",
 "https://learniaa.com/user/ReportVotes/store/",
  "https://learniaa.com/user/Notification/create/",
"https://learniaa.com/user/Notification/store/",
"https://learniaa.com/user/Notification/edit/",
"https://learniaa.com/user/Notification/update/",
 "https://learniaa.com/user/vote/index/",
"https://learniaa.com/user/vote/show/",
 "https://learniaa.com/user/vote/store/",
  "https://learniaa.com/css/site/bootstrap/bootstrap.css",
  "https://learniaa.com/css/site/myStyle.css",
  "https://learniaa.com/css/site/myStyle.css",
  "https://learniaa.com/css/site/slick.css",
  "https://learniaa.com/js/materialize.min.js",
  "https://learniaa.com/css/site/slick-theme.css",
  "https://learniaa.com/js/core/jquery.min.js",
  "https://learniaa.com/js/core/bootstrap.min.js",
  "https://learniaa.com/js/core/slick.min.js",
  "https://learniaa.com/js/videoplayer/afterglow.min.js",
  "https://learniaa.com/js/materialize.min.js",
  "https://learniaa.com/css/site/slick-theme.css"
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
  );
});