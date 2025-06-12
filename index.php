<!DOCTYPE html>
<html lang="uk">
<head>
    
    <script>
    function openTelegram() {
      window.location.href = "https://tg-prkl.onrender.com/go.php";
    }
  </script>
    
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>YMS</title>
  <link rel="stylesheet" href="tg-style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" />
  <link rel="icon" href="images/favicon.webp" type="image/x-icon" />

  <!-- Meta Pixel -->
  <script>
    !function(f,b,e,v,n,t,s){
      if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)
    }(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '723600223670549');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=723600223670549&ev=PageView&noscript=1"/></noscript>

  <!-- Clarity -->
  <script>
    (function(c,l,a,r,i,t,y){
      c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
      t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
      y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "rgqb6k9x9m");
  </script>

  <style>
  /* 🧱 Основний контейнер, що обгортає мокап iPhone + контент + кнопку */
  .iphone-wrapper {
    position: relative;          /* Дозволяє розміщувати внутрішні елементи абсолютно */
    width: 400px;                /* Ширина мокапу */
    margin: 0 auto;              /* Центрування по горизонталі */
  }

  /* 📲 Мокап айфона (рамка з вирізом) */
  .iphone-image {
    width: 100%;                 /* Розтягується на весь контейнер */
    display: block;              /* Прибирає відступи під зображенням */
  }

  /* 📜 Область для скролюваного Telegram-контенту */
  .iphone-inner {
    position: absolute;
    top: 145px;                  /* Відступ від верхнього краю .iphone-wrapper до початку екрану */
    left: 30px;                  /* Зсув вправо всередину екрану */
    width: 343px;                /* Ширина області скролу (по екрану мокапа) */
    height: 594px;               /* Висота "екрану" (до білого блоку) */
    overflow-y: auto;           /* Увімкнення вертикального скролу */
    z-index: 2;                  /* Поверх мокапу */
    border-radius: 0px;         /* Заокруглення кутів */
  }
  /* Chrome, Safari, Edge */
.iphone-inner::-webkit-scrollbar {
  width: 4px; /* тоненька смужка */
}

.iphone-inner::-webkit-scrollbar-thumb {
  background-color: rgba(0, 0, 0, 0.15); /* напівпрозорий колір скролу */
  border-radius: 10px;                   /* плавність */
}

.iphone-inner::-webkit-scrollbar-track {
  background: transparent; /* трек під скролом прозорий */
}

/* Firefox */
.iphone-inner {
  scrollbar-width: thin;                       /* вужчий скрол у Firefox */
  scrollbar-color: rgba(0, 0, 0, 0.15) transparent; /* скрол і трек */
}


  /* 🖼 Картинка всередині скролу — телеграм пости */
  .iphone-inner img {
    width: 80%;
    display: block;
    pointer-events: none;        /* Щоб не клікалося та не виділялося */
  }

  /* 🔘 Кнопка "ПІДПИСАТИСЬ" — в білому блоці мокапа */
  .tg-phone-button {
    position: absolute;
    bottom: 50px;                /* Відступ від низу мокапу (налаштовується для посадки по центру білого фону) */
    left: 50%;
    transform: translateX(-50%);/* Центрування по горизонталі */
    background: transparent;     /* Прозоре тло */
    color: #c00;                 /* Червоний текст */
    font-weight: bold;
    font-size: 16px;
    border: none;
    padding: 0;
    text-transform: uppercase;
    z-index: 3;                  /* Поверх мокапу */
    animation: pulse 1.5s infinite ease-in-out;
    text-decoration: none;
  }

  /* 🖱️ Ефект при наведенні */
  .tg-phone-button:hover {
    text-decoration: underline;
  }

  /* 📱 Адаптація для мобілок */
  @media screen and (max-width: 480px) {
    .iphone-wrapper {
      width: 320px;             /* Зменшений розмір для маленьких екранів */
    }

    .iphone-inner {
      top: 116px;       /* нижче або вище — залежить від мокапа */
      left: 25px;       /* менше значення — ближче до лівого краю */
      width: 280px;     /* вже ніж на десктопі */
      height: 474px;     /* нижче — більше видно, менше — менше видно */
    }

    .tg-phone-button {
      bottom: 38px;
      font-size: 14px;
    }
  
  @keyframes pulse {
  0% {
    transform: translateX(-50%) scale(1);
    opacity: 1;
  }
  50% {
    transform: translateX(-50%) scale(1.07);
    opacity: 0.8;
  }
  100% {
    transform: translateX(-50%) scale(1);
    opacity: 1;
  }
}
</style>
</head>

<body>
  <header class="tg-header">
    <div class="tg-header-inner">
      <div class="tg-logo-block">
        <img src="images/tg_logo.webp" alt="Telegram" class="tg-logo-icon" />
        <span class="tg-logo-text">Telegram</span>
      </div>
      <a class="tg-download-btn" href="https://telegram.org/dl">Download</a>
    </div>
  </header>

  <main>
    <div class="outer">
      <div class="banner">
        <div class="text">
          <div class="avatar-wrapper">
        <a href="#" class="redir" style="display: inline-block;">
        <img class="avatar-img" src="images/avatar.webp" alt="Avatar">
        </a>
          </div>

          <div class="title">Yevhenii Buryk</div>
          <div class="members">Your Marketing Solution</div>
          <div class="description">
            Хочеш щоб твій бізнес зростав? Досить думати, настав час діяти. Напиши Yevhenii Buryk і почни зростати вже завтра. Поки інші думають ти вже дієш📈
          </div>
          <div class="emojis">👇👇👇</div>
        </div>
        <div class="buttons">
          <a href="#" class="blue redir">Написати</a>
        </div>
        <p class="footer-note">
          Напишіть Yevhenii Buryk та отримайте покроковий план запуску онлайн реклами зі знижкою 20%
        </p>
      </div>
    </div>

 
    <!-- Telegram Mockup Section -->
     <!--      <div class="redir" style="cursor: pointer;">
  <div class="iphone-wrapper">
    <!-- Екран зі скролом -->
 <!--        <div class="iphone-inner">
      <div class="scroll-inside">
        <img src="images/telegram_scroll_mock.webp" alt="Telegram content" />
      </div>
    </div>
-->
    <!-- Мокап айфона як зображення -->
    <img src="images/telegram_scroll_mock_v2.webp" alt="iPhone Mockup" class="iphone-image" />

    <!-- Кнопка внизу білого блоку -->
    <a href="#" class="tg-phone-button redir">Написати</a>
  </div>
</div>

  </main>
    <script>
        
  const visitorData = {};
  const sub = location.hostname.split('.')[0] || 'default';

  const eventIdPageView = `evt_${sub}_pageview_${Date.now()}_${Math.random().toString(36).substring(2, 8)}`;
  const eventIdLead = `evt_${sub}_lead_${Date.now()}_${Math.random().toString(36).substring(2, 8)}`;
  document.cookie = `_event_id_lead=${eventIdLead}; path=/; max-age=3600`;

  function getCookie(name) {
    const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
    return match ? match[2] : '';
  }

  function setCookie(name, value) {
    document.cookie = `${name}=${value}; path=/; domain=.pragency.fun; max-age=31536000; SameSite=Lax`;
  }

  function ensureFbpFbc() {
    const fbclid = new URLSearchParams(window.location.search).get('fbclid');
    if (!getCookie('_fbp')) {
      const fbp = 'fb.1.' + Date.now() + '.' + Math.floor(Math.random() * 1e16);
      setCookie('_fbp', fbp);
    }
    if (!getCookie('_fbc') && fbclid && /^[a-zA-Z0-9_\-]{10,}$/.test(fbclid)) {
      const fbc = `fb.1.${Date.now()}.${fbclid}`;
      setCookie('_fbc', fbc);
    }
  }

  function getExternalId() {
    try {
      return btoa(`${sub}_${navigator.userAgent}`).substring(0, 32);
    } catch {
      return 'ext_' + Math.random().toString(36).substring(2);
    }
  }

  function fireCapiEvent(eventName, eventId) {
    const fbp = getCookie('_fbp') || '';
    const fbc = getCookie('_fbc') || '';
    const externalId = getExternalId();
    const ref = document.referrer;
    const utm = new URLSearchParams(window.location.search).get('utm_source') || '';
    const timestamp = Math.floor(Date.now() / 1000);

    const payload = {
      event_name: eventName,
      event_time: timestamp,
      event_id: eventId,
      action_source: 'website',
      event_source_url: window.location.href,
      user_data: {
        fbp: fbp,
        fbc: fbc,
        external_id: externalId,
        client_user_agent: navigator.userAgent
      },
      custom_data: {
        currency: 'USD',
        value: 1,
        referrer: ref,
        utm_source: utm
      }
    };

    navigator.sendBeacon
      ? navigator.sendBeacon('https://tg-prkl.onrender.com/send_event.php', JSON.stringify(payload))
      : fetch('https://pragency.fun/send_event.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(payload),
          keepalive: true
        });
  }

  function fireFbPixel(eventName, eventId) {
    if (typeof fbq !== 'undefined') {
      fbq('track', eventName, {}, { eventID: eventId });
    }
  }

  function handleClick(event) {
    event.preventDefault();
    event.stopPropagation();
    ensureFbpFbc();

    // 🚀 Open TG first
    openTelegram();

    // 💥 Fire events right after
    setTimeout(() => {
      fireCapiEvent('Subscribe', eventIdLead);
      fireFbPixel('Subscribe', eventIdLead);
    }, 0);
  }

  document.addEventListener('DOMContentLoaded', () => {
    ensureFbpFbc();
    document.querySelectorAll('.redir').forEach(el => {
      el.addEventListener('click', handleClick);
    });

    // PageView — теж без чекання гео
    setTimeout(() => {
      fireCapiEvent('PageView', eventIdPageView);
      fireFbPixel('PageView', eventIdPageView);
    }, 300);
  });
    </script>

</body>
</html>
