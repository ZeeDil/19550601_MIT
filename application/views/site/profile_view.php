<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<style>
    @import url(https://fonts.googleapis.com/css?family=Gabriela);
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    html, body, div, h1, h2, h3, p, pre {
        margin: 0;
        padding: 0;
        color: #333;
    }
    html, body {
        background: #ededed;
        /*font-family: 'Open Sans', Helvetica, Arial, sans-serif;*/
    }
    h1 {
        padding: 40px 0 20px;
        text-align: center;
        text-shadow: 3px 3px rgba(0,0,0,0.1);
        color: #fff;
    }
    p {
        margin-bottom: 40px;
        text-align: center;
    }

    .bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .page {
        position: relative;
        max-width: 980px;
        margin: 0 auto;
        padding: 0 20px 40px;
    }

    /**/
    /* main styles */
    /**/
    .pcss3t {
        margin: 0;
        padding: 0;
        border: 0;
        outline: none;
        font-size: 0;
        text-align: left;
    }
    .pcss3t > input {
        position: absolute;
        left: -9999px;
    }
    .pcss3t > label {
        position: relative;
        display: inline-block;
        margin: 0;
        padding: 0;
        border: 0;
        outline: none;
        cursor: pointer;
        transition: all 0.1s;
        -o-transition: all 0.1s;
        -ms-transition: all 0.1s;
        -moz-transition: all 0.1s;
        -webkit-transition: all 0.1s;
    }
    .pcss3t > label i {
        display: block;
        float: left;
        margin: 16px 8px 0 -2px;
        padding: 0;
        border: 0;
        outline: none;
        font-family: FontAwesome;
        font-style: normal;
        font-size: 17px;
    }
    .pcss3t > input:checked + label {
        cursor: default;
    }
    .pcss3t > ul {
        list-style: none;
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
        border: 0;
        outline: none;
        font-size: 13px;
    }
    .pcss3t > ul > li {
        position: absolute;
        width: 100%;
        overflow: hidden;
        padding: 30px 40px 40px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        opacity: 0;
        transition: all 0.5s;
        -o-transition: all 0.5s;
        -ms-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -webkit-transition: all 0.5s;
    }
    .pcss3t > .tab-content-first:checked ~ ul .tab-content-first,
    .pcss3t > .tab-content-2:checked ~ ul .tab-content-2,
    .pcss3t > .tab-content-3:checked ~ ul .tab-content-3,
    .pcss3t > .tab-content-4:checked ~ ul .tab-content-4,
    .pcss3t > .tab-content-5:checked ~ ul .tab-content-5,
    .pcss3t > .tab-content-6:checked ~ ul .tab-content-6,
    .pcss3t > .tab-content-7:checked ~ ul .tab-content-7,
    .pcss3t > .tab-content-8:checked ~ ul .tab-content-8,
    .pcss3t > .tab-content-9:checked ~ ul .tab-content-9,
    .pcss3t > .tab-content-last:checked ~ ul .tab-content-last {
        z-index: 1;
        top: 0;
        left: 0;
        opacity: 1;
        -webkit-transform: scale(1,1);
        -webkit-transform: rotate(0deg);
    }


    /*----------------------------------------------------------------------------*/
    /*                                 EXTENSIONS                                 */
    /*----------------------------------------------------------------------------*/

    /**/
    /* auto height */
    /**/
    .pcss3t-height-auto > ul {
        height: auto !important;
    }
    .pcss3t-height-auto > ul > li {
        position: static;
        display: none;
        height: auto !important;
    }
    .pcss3t-height-auto > .tab-content-first:checked ~ ul .tab-content-first,
    .pcss3t-height-auto > .tab-content-2:checked ~ ul .tab-content-2,
    .pcss3t-height-auto > .tab-content-3:checked ~ ul .tab-content-3,
    .pcss3t-height-auto > .tab-content-4:checked ~ ul .tab-content-4,
    .pcss3t-height-auto > .tab-content-5:checked ~ ul .tab-content-5,
    .pcss3t-height-auto > .tab-content-last:checked ~ ul .tab-content-last {
        display: block;
    }


    /**/
    /* grid */
    /**/
    .pcss3t .grid-row {
        margin-top: 20px;
    }
    .pcss3t .grid-row:after {
        content: '';
        display: table;
        clear: both;
    }
    .pcss3t .grid-row:first-child {
        margin-top: 0;
    }
    .pcss3t .grid-col {
        display: block;
        float: left;
        margin-left: 2%;
    }
    .pcss3t .grid-col:first-child {
        margin-left: 0;
    }
    .pcss3t .grid-col .inner {
        padding: 10px 0;
        border-radius: 5px;
        background: #f2f2f2;
        text-align: center;
    }
    .pcss3t .grid-col-1 {
        width: 15%;
    }
    .pcss3t .grid-col-2 {
        width: 32%;
    }
    .pcss3t .grid-col-3 {
        width: 49%;
    }
    .pcss3t .grid-col-4 {
        width: 66%;
    }
    .pcss3t .grid-col-5 {
        width: 83%;
    }
    .pcss3t .grid-col-offset-1 {
        margin-left: 19%;
    }
    .pcss3t .grid-col-offset-1:first-child  {
        margin-left: 17%;
    }
    .pcss3t .grid-col-offset-2 {
        margin-left: 36%;
    }
    .pcss3t .grid-col-offset-2:first-child {
        margin-left: 34%;
    }
    .pcss3t .grid-col-offset-3 {
        margin-left: 53%;
    }
    .pcss3t .grid-col-offset-3:first-child {
        margin-left: 51%;
    }
    .pcss3t .grid-col-offset-4 {
        margin-left: 70%;
    }
    .pcss3t .grid-col-offset-4:first-child {
        margin-left: 68%;
    }
    .pcss3t .grid-col-offset-5:first-child {
        margin-left: 85%;
    }


    /**/
    /* typography */
    /**/
    .pcss3t .typography {
        color: #666;
    }
    .pcss3t .typography h1,
    .pcss3t .typography h2,
    .pcss3t .typography h3,
    .pcss3t .typography h4,
    .pcss3t .typography h5,
    .pcss3t .typography h6 {
        margin: 40px 0 0 0;
        padding: 0;
        font-family: Gabriela, Georgia, serif;
        text-align: left;
        color: #333;
    }
    .pcss3t .typography h1 {
        font-size: 40px;
        line-height: 60px;
        text-shadow: 3px 3px rgba(0,0,0,0.1);
    }
    .pcss3t .typography h2 {
        font-size: 32px;
        line-height: 48px;
        text-shadow: 2px 2px rgba(0,0,0,0.1);
    }
    .pcss3t .typography h3 {
        font-size: 26px;
        line-height: 38px;
        text-shadow: 1px 1px rgba(0,0,0,0.1);
    }
    .pcss3t .typography h4 {
        font-size: 20px;
        line-height: 30px;
    }
    .pcss3t .typography h5 {
        font-size: 15px;
        line-height: 23px;
        text-transform: uppercase;
    }
    .pcss3t .typography h6 {
        font-size: 13px;
        line-height: 20px;
        font-weight: 700;
        text-transform: uppercase;
    }
    .pcss3t .typography p {
        margin: 20px 0 0 0;
        padding: 0;
        line-height: 20px;
        text-align: left;
    }
    .pcss3t .typography ul,
    .pcss3t .typography ol {
        list-style: none;
        margin: 20px 0 0 0;
        padding: 0;
    }
    .pcss3t .typography li {
        position: relative;
        margin-top: 5px;
        padding-left: 20px;
    }
    .pcss3t .typography li ul,
    .pcss3t .typography li ol {
        margin-top: 5px;
    }
    .pcss3t .typography ul li:before {
        content: '';
        position: absolute;
        top: 8px;
        left: 0;
        width: 6px;
        height: 4px;
        background: #404040;
    }
    .pcss3t .typography ol {
        counter-reset: list1;
    }
    .pcss3t .typography ol > li:before {
        counter-increment:list1;
        content: counter(list1)'.';
        position: absolute;
        top: 0;
        left: 0;
    }
    .pcss3t .typography a {
        text-decoration: underline;
        color: #1889e6;
    }
    .pcss3t .typography a:hover {
        text-decoration: none;
    }
    .pcss3t .typography .pic {
        padding: 4px;
        border: 1px dotted #ccc;
    }
    .pcss3t .typography .pic img {
        display: block;
    }
    .pcss3t .typography .pic-right {
        float: right;
        margin: 0 0 10px 20px;
    }
    .pcss3t .typography .link {
        text-decoration: underline;
        color: #1889e6;
        cursor: pointer;
    }
    .pcss3t .typography .link:hover {
        text-decoration: none;
    }
    .pcss3t .typography h1:first-child,
    .pcss3t .typography h2:first-child,
    .pcss3t .typography h3:first-child,
    .pcss3t .typography h4:first-child,
    .pcss3t .typography h5:first-child,
    .pcss3t .typography h6:first-child,
    .pcss3t .typography p:first-child {
        margin-top: 0;
    }
    .pcss3t .typography .text-center {
        text-align: center;
    }
    .pcss3t .typography .text-right {
        text-align: right;
    }


    /**/
    /* steps */
    /**/
    .pcss3t-steps > label {
        cursor: default;
    }


    /**/
    /* animation effects */
    /**/
    .pcss3t-effect-scale > ul > li {
        -webkit-transform: scale(0.1,0.1);
    }
    .pcss3t-effect-rotate  > ul > li {
        -webkit-transform: rotate(180deg);
    }
    .pcss3t-effect-slide-top > ul > li {
        top: -40px;
    }
    .pcss3t-effect-slide-right > ul > li {
        left: 80px;
    }
    .pcss3t-effect-slide-bottom > ul > li {
        top: 40px;
    }
    .pcss3t-effect-slide-left > ul > li {
        left: -80px;
    }



    /*----------------------------------------------------------------------------*/
    /*                                   LAYOUTS                                  */
    /*----------------------------------------------------------------------------*/

    /**/
    /* top right */
    /**/
    .pcss3t-layout-top-right {
        text-align: right;
    }


    /**/
    /* top center */
    /**/
    .pcss3t-layout-top-center {
        text-align: center;
    }


    /**/
    /* top combi */
    /**/
    .pcss3t > .right {
        float: right;
    }



    /*----------------------------------------------------------------------------*/
    /*                                    ICONS                                   */
    /*----------------------------------------------------------------------------*/

    /**/
    /* icons positions */
    /**/
    .pcss3t-icons-top > label {
        text-align: center;
    }
    .pcss3t-icons-top > label i {
        float: none;
        margin: 0 auto -10px;
        padding-top: 17px;
        font-size: 23px;
        line-height: 23px;
        text-align: center;
    }
    .pcss3t-icons-right > label i {
        float: right;
        margin: 0 -2px 0 8px;
    }
    .pcss3t-icons-bottom > label {
        text-align: center;
    }
    .pcss3t-icons-bottom > label i {
        float: none;
        margin: -10px auto 0;
        padding-bottom: 17px;
        font-size: 23px;
        line-height: 23px;
        text-align: center;
    }
    .pcss3t-icons-only > label i {
        float: none;
        margin: 0 auto;
        font-size: 23px;
    }


    /**/
    /* font awesome */
    /**/
    @font-face
    {
        font-family: 'FontAwesome';
        src: url('../fonts/fontawesome-webfont.eot?v=3.0.1');
        src: url('../fonts/fontawesome-webfont.eot?#iefix&v=3.0.1') format('embedded-opentype'),
        url('../fonts/fontawesome-webfont.woff?v=3.0.1') format('woff'),
        url('../fonts/fontawesome-webfont.ttf?v=3.0.1') format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    .icon-glass:before {content: '\f000';}
    .icon-music:before {content: '\f001';}
    .icon-search:before {content: '\f002';}
    .icon-envelope:before {content: '\f003';}
    .icon-heart:before {content: '\f004';}
    .icon-star:before {content: '\f005';}
    .icon-star-empty:before {content: '\f006';}
    .icon-user:before {content: '\f007';}
    .icon-film:before {content: '\f008';}
    .icon-th-large:before {content: '\f009';}
    .icon-th:before {content: '\f00a';}
    .icon-th-list:before {content: '\f00b';}
    .icon-ok:before {content: '\f00c';}
    .icon-remove:before {content: '\f00d';}
    .icon-zoom-in:before {content: '\f00e';}
    .icon-zoom-out:before {content: '\f010';}
    .icon-off:before {content: '\f011';}
    .icon-signal:before {content: '\f012';}
    .icon-cog:before {content: '\f013';}
    .icon-trash:before {content: '\f014';}
    .icon-home:before {content: '\f015';}
    .icon-file:before {content: '\f016';}
    .icon-time:before {content: '\f017';}
    .icon-road:before {content: '\f018';}
    .icon-download-alt:before {content: '\f019';}
    .icon-download:before {content: '\f01a';}
    .icon-upload:before {content: '\f01b';}
    .icon-inbox:before {content: '\f01c';}
    .icon-play-circle:before {content: '\f01d';}
    .icon-repeat:before {content: '\f01e';}
    .icon-refresh:before {content: '\f021';}
    .icon-list-alt:before {content: '\f022';}
    .icon-lock:before {content: '\f023';}
    .icon-flag:before {content: '\f024';}
    .icon-headphones:before {content: '\f025';}
    .icon-volume-off:before {content: '\f026';}
    .icon-volume-down:before {content: '\f027';}
    .icon-volume-up:before {content: '\f028';}
    .icon-qrcode:before {content: '\f029';}
    .icon-barcode:before {content: '\f02a';}
    .icon-tag:before {content: '\f02b';}
    .icon-tags:before {content: '\f02c';}
    .icon-book:before {content: '\f02d';}
    .icon-bookmark:before {content: '\f02e';}
    .icon-print:before {content: '\f02f';}
    .icon-camera:before {content: '\f030';}
    .icon-font:before {content: '\f031';}
    .icon-bold:before {content: '\f032';}
    .icon-italic:before {content: '\f033';}
    .icon-text-height:before {content: '\f034';}
    .icon-text-width:before {content: '\f035';}
    .icon-align-left:before {content: '\f036';}
    .icon-align-center:before {content: '\f037';}
    .icon-align-right:before {content: '\f038';}
    .icon-align-justify:before {content: '\f039';}
    .icon-list:before {content: '\f03a';}
    .icon-indent-left:before {content: '\f03b';}
    .icon-indent-right:before {content: '\f03c';}
    .icon-facetime-video:before  {content: '\f03d';}
    .icon-picture:before {content: '\f03e';}
    .icon-pencil:before {content: '\f040';}
    .icon-map-marker:before {content: '\f041';}
    .icon-adjust:before {content: '\f042';}
    .icon-tint:before {content: '\f043';}
    .icon-edit:before {content: '\f044';}
    .icon-share:before {content: '\f045';}
    .icon-check:before {content: '\f046';}
    .icon-move:before {content: '\f047';}
    .icon-step-backward:before {content: '\f048';}
    .icon-fast-backward:before {content: '\f049';}
    .icon-backward:before {content: '\f04a'; position: relative;	left: -2px;}
    .icon-play:before {content: '\f04b'; position: relative; left: 1px;}
    .icon-pause:before {content: '\f04c';}
    .icon-stop:before {content: '\f04d';}
    .icon-forward:before {content: '\f04e'; position: relative;	left: 2px;}
    .icon-fast-forward:before {content: '\f050';}
    .icon-step-forward:before {content: '\f051';}
    .icon-eject:before {content: '\f052';}
    .icon-chevron-left:before {content: '\f053';}
    .icon-chevron-right:before {content: '\f054';}
    .icon-plus-sign:before {content: '\f055';}
    .icon-minus-sign:before {content: '\f056';}
    .icon-remove-sign:before {content: '\f057';}
    .icon-ok-sign:before {content: '\f058';}
    .icon-question-sign:before {content: '\f059';}
    .icon-info-sign:before {content: '\f05a';}
    .icon-screenshot:before {content: '\f05b';}
    .icon-remove-circle:before {content: '\f05c';}
    .icon-ok-circle:before {content: '\f05d';}
    .icon-ban-circle:before {content: '\f05e';}
    .icon-arrow-left:before {content: '\f060';}
    .icon-arrow-right:before {content: '\f061';}
    .icon-arrow-up:before {content: '\f062';}
    .icon-arrow-down:before {content: '\f063';}
    .icon-share-alt:before {content: '\f064';}
    .icon-resize-full:before {content: '\f065';}
    .icon-resize-small:before {content: '\f066';}
    .icon-plus:before {content: '\f067';}
    .icon-minus:before {content: '\f068';}
    .icon-asterisk:before {content: '\f069';}
    .icon-exclamation-sign:before {content: '\f06a';}
    .icon-gift:before {content: '\f06b';}
    .icon-leaf:before {content: '\f06c';}
    .icon-fire:before {content: '\f06d';}
    .icon-eye-open:before {content: '\f06e';}
    .icon-eye-close:before {content: '\f070';}
    .icon-warning-sign:before {content: '\f071';}
    .icon-plane:before {content: '\f072';}
    .icon-calendar:before {content: '\f073';}
    .icon-random:before {content: '\f074';}
    .icon-comment:before {content: '\f075';}
    .icon-magnet:before {content: '\f076';}
    .icon-chevron-up:before {content: '\f077';}
    .icon-chevron-down:before {content: '\f078';}
    .icon-retweet:before {content: '\f079';}
    .icon-shopping-cart:before {content: '\f07a';}
    .icon-folder-close:before {content: '\f07b';}
    .icon-folder-open:before {content: '\f07c';}
    .icon-resize-vertical:before {content: '\f07d';}
    .icon-resize-horizontal:before {content: '\f07e';}
    .icon-bar-chart:before {content: '\f080';}
    .icon-twitter-sign:before {content: '\f081';}
    .icon-facebook-sign:before {content: '\f082';}
    .icon-camera-retro:before {content: '\f083';}
    .icon-key:before {content: '\f084';}
    .icon-cogs:before {content: '\f085';}
    .icon-comments:before {content: '\f086';}
    .icon-thumbs-up:before {content: '\f087';}
    .icon-thumbs-down:before {content: '\f088';}
    .icon-star-half:before {content: '\f089';}
    .icon-heart-empty:before {content: '\f08a';}
    .icon-signout:before {content: '\f08b';}
    .icon-linkedin-sign:before {content: '\f08c';}
    .icon-pushpin:before {content: '\f08d';}
    .icon-external-link:before {content: '\f08e';}
    .icon-signin:before {content: '\f090';}
    .icon-trophy:before {content: '\f091';}
    .icon-github-sign:before {content: '\f092';}
    .icon-upload-alt:before {content: '\f093';}
    .icon-lemon:before {content: '\f094';}
    .icon-phone:before {content: '\f095';}
    .icon-check-empty:before {content: '\f096';}
    .icon-bookmark-empty:before {content: '\f097';}
    .icon-phone-sign:before {content: '\f098';}
    .icon-twitter:before {content: '\f099';}
    .icon-facebook:before {content: '\f09a';}
    .icon-github:before {content: '\f09b';}
    .icon-unlock:before {content: '\f09c';}
    .icon-credit-card:before {content: '\f09d';}
    .icon-rss:before {content: '\f09e';}
    .icon-hdd:before {content: '\f0a0';}
    .icon-bullhorn:before {content: '\f0a1';}
    .icon-bell:before {content: '\f0a2';}
    .icon-certificate:before {content: '\f0a3';}
    .icon-hand-right:before {content: '\f0a4';}
    .icon-hand-left:before {content: '\f0a5';}
    .icon-hand-up:before {content: '\f0a6';}
    .icon-hand-down:before {content: '\f0a7';}
    .icon-circle-arrow-left:before {content: '\f0a8';}
    .icon-circle-arrow-right:before {content: '\f0a9';}
    .icon-circle-arrow-up:before {content: '\f0aa';}
    .icon-circle-arrow-down:before {content: '\f0ab';}
    .icon-globe:before {content: '\f0ac';}
    .icon-wrench:before {content: '\f0ad';}
    .icon-tasks:before {content: '\f0ae';}
    .icon-filter:before {content: '\f0b0';}
    .icon-briefcase:before {content: '\f0b1';}
    .icon-fullscreen:before {content: '\f0b2';}
    .icon-group:before {content: '\f0c0';}
    .icon-link:before {content: '\f0c1';}
    .icon-cloud:before {content: '\f0c2';}
    .icon-beaker:before {content: '\f0c3';}
    .icon-cut:before {content: '\f0c4';}
    .icon-copy:before {content: '\f0c5';}
    .icon-paper-clip:before {content: '\f0c6';}
    .icon-save:before {content: '\f0c7';}
    .icon-sign-blank:before {content: '\f0c8';}
    .icon-reorder:before {content: '\f0c9';}
    .icon-list-ul:before {content: '\f0ca';}
    .icon-list-ol:before {content: '\f0cb';}
    .icon-strikethrough:before {content: '\f0cc';}
    .icon-underline:before {content: '\f0cd';}
    .icon-table:before {content: '\f0ce';}
    .icon-magic:before {content: '\f0d0';}
    .icon-truck:before {content: '\f0d1';}
    .icon-pinterest:before {content: '\f0d2';}
    .icon-pinterest-sign:before {content: '\f0d3';}
    .icon-google-plus-sign:before {content: '\f0d4';}
    .icon-google-plus:before {content: '\f0d5';}
    .icon-money:before {content: '\f0d6';}
    .icon-caret-down:before {content: '\f0d7';}
    .icon-caret-up:before {content: '\f0d8';}
    .icon-caret-left:before {content: '\f0d9';}
    .icon-caret-right:before {content: '\f0da';}
    .icon-columns:before {content: '\f0db';}
    .icon-sort:before {content: '\f0dc';}
    .icon-sort-down:before {content: '\f0dd';}
    .icon-sort-up:before {content: '\f0de';}
    .icon-envelope-alt:before {content: '\f0e0';}
    .icon-linkedin:before {content: '\f0e1';}
    .icon-undo:before {content: '\f0e2';}
    .icon-legal:before {content: '\f0e3';}
    .icon-dashboard:before {content: '\f0e4';}
    .icon-comment-alt:before {content: '\f0e5';}
    .icon-comments-alt:before {content: '\f0e6';}
    .icon-bolt:before {content: '\f0e7';}
    .icon-sitemap:before {content: '\f0e8';}
    .icon-umbrella:before {content: '\f0e9';}
    .icon-paste:before {content: '\f0ea';}
    .icon-lightbulb:before {content: '\f0eb';}
    .icon-exchange:before {content: '\f0ec';}
    .icon-cloud-download:before {content: '\f0ed';}
    .icon-cloud-upload:before {content: '\f0ee';}
    .icon-user-md:before {content: '\f0f0';}
    .icon-stethoscope:before {content: '\f0f1';}
    .icon-suitcase:before {content: '\f0f2';}
    .icon-bell-alt:before {content: '\f0f3';}
    .icon-coffee:before {content: '\f0f4';}
    .icon-food:before {content: '\f0f5';}
    .icon-file-alt:before {content: '\f0f6';}
    .icon-building:before {content: '\f0f7';}
    .icon-hospital:before {content: '\f0f8';}
    .icon-ambulance:before {content: '\f0f9';}
    .icon-medkit:before {content: '\f0fa';}
    .icon-fighter-jet:before {content: '\f0fb';}
    .icon-beer:before {content: '\f0fc';}
    .icon-h-sign:before {content: '\f0fd';}
    .icon-plus-sign-alt:before {content: '\f0fe';}
    .icon-double-angle-left:before {content: '\f100';}
    .icon-double-angle-right:before {content: '\f101';}
    .icon-double-angle-up:before {content: '\f102';}
    .icon-double-angle-down:before {content: '\f103';}
    .icon-angle-left:before {content: '\f104';}
    .icon-angle-right:before {content: '\f105';}
    .icon-angle-up:before {content: '\f106';}
    .icon-angle-down:before {content: '\f107';}
    .icon-desktop:before {content: '\f108';}
    .icon-laptop:before {content: '\f109';}
    .icon-tablet:before {content: '\f10a';}
    .icon-mobile-phone:before {content: '\f10b';}
    .icon-circle-blank:before {content: '\f10c';}
    .icon-quote-left:before {content: '\f10d';}
    .icon-quote-right:before {content: '\f10e';}
    .icon-spinner:before {content: '\f110';}
    .icon-circle:before {content: '\f111';}
    .icon-reply:before {content: '\f112';}
    .icon-github-alt:before {content: '\f113';}
    .icon-folder-close-alt:before {content: '\f114';}
    .icon-folder-open-alt:before {content: '\f115';}



    /*----------------------------------------------------------------------------*/
    /*                               RESPONSIVENESS                               */
    /*----------------------------------------------------------------------------*/

    /**/
    /* pad */
    /**/
    @media screen and (max-width: 980px) {

    }


    /**/
    /* phone */
    /**/
    @media screen and (max-width: 767px) {
        .pcss3t > label {
            display: block;
        }
        .pcss3t > .right {
            float: none;
        }
    }



    /*----------------------------------------------------------------------------*/
    /*                                   THEMES                                   */
    /*----------------------------------------------------------------------------*/

    /**/
    /* default */
    /**/
    .pcss3t > label {
        padding: 0 20px;
        background: #e5e5e5;
        font-size: 13px;
        line-height: 49px;
    }
    .pcss3t > label:hover {
        background: #f2f2f2;
    }
    .pcss3t > input:checked + label {
        background: #fff;
    }
    .pcss3t > ul {
        background: #fff;
        text-align: left;
    }
    .pcss3t-steps > label:hover {
        background: #e5e5e5;
    }


    /**/
    /* theme 1 */
    /**/
    .pcss3t-theme-1 > label {
        margin: 0 5px 5px 0;
        border-radius: 5px;
        background: #fff;
        box-shadow: 0 2px rgba(0,0,0,0.2);
        color: #808080;
        opacity: 0.8;
    }
    .pcss3t-theme-1 > label:hover {
        background: #fff;
        opacity: 1;
    }
    .pcss3t-theme-1 > input:checked + label {
        margin-bottom: 0;
        padding-bottom: 5px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        color: #2a9f00;
        opacity: 1;
    }
    .pcss3t-theme-1 > ul {
        border-radius: 5px;
        box-shadow: 0 3px rgba(0,0,0,0.2);
    }
    .pcss3t-theme-1 > .tab-content-first:checked ~ ul {
        border-top-left-radius: 0;
    }
    @media screen and (max-width: 767px) {
        .pcss3t-theme-1 > label {
            margin-right: 0;
        }
        .pcss3t-theme-1 > input:checked + label {
            margin-bottom: 5px;
            padding-bottom: 0;
            border-radius: 5px;
        }
        .pcss3t-theme-1 > .tab-content-first:checked ~ ul {
            border-top-left-radius: 5px;
        }
    }


    /**/
    /* theme 2 */
    /**/
    .pcss3t-theme-2 {
        padding: 5px;
        background: rgba(0,0,0,0.2);
    }
    .pcss3t-theme-2 > label {
        margin-right: 0;
        margin-bottom: 0;
        background: none;
        border-radius: 0;
        text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
        color: #fff;
        opacity: 1;
    }
    .pcss3t-theme-2 > label:hover {
        background: rgba(255,255,255,0.2);
    }
    .pcss3t-theme-2 > input:checked + label {
        padding-bottom: 0;
        background: #fff;
        background: linear-gradient(to bottom, #e5e5e5 0%, #ffffff 100%);
        background: -o-linear-gradient(top, #e5e5e5 0%, #ffffff 100%);
        background: -ms-linear-gradient(top, #e5e5e5 0%, #ffffff 100%);
        background: -moz-linear-gradient(top, #e5e5e5 0%, #ffffff 100%);
        background: -webkit-linear-gradient(top, #e5e5e5 0%, #ffffff 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=0);
        text-shadow: 1px 1px 1px rgba(255,255,255,0.5);
        color: #822bd9;
    }
    .pcss3t-theme-2 > ul {
        margin: 0 -5px -5px;
        border-radius: 0;
        box-shadow: none;
    }
    @media screen and (max-width: 767px) {
        .pcss3t-theme-2 > ul {
            margin-top: 5px;
        }
    }


    /**/
    /* theme 3 */
    /**/
    .pcss3t-theme-3 {
        background: rgba(0,0,0,0.8);
    }
    .pcss3t-theme-3 > label {
        background: none;
        border-right: 1px dotted rgba(255,255,255,0.5);
        text-align: center;
        color: #fff;
        opacity: 0.6;
    }
    .pcss3t-theme-3 > label:hover {
        background: none;
        color: #d9d92b;
        opacity: 0.8;
    }
    .pcss3t-theme-3 > input:checked + label {
        background: #d9d92b;
        color: #000;
        opacity: 1;
    }
    .pcss3t-theme-3 > ul {
        border-top: 4px solid #d9d92b;
        border-bottom: 4px solid #d9d92b;
        border-radius: 0;
        box-shadow: none;
    }


    /**/
    /* theme 4 */
    /**/
    .pcss3t-theme-4 > label {
        margin: 0 10px 10px 0;
        border-radius: 5px;
        background: #78c5fd;
        background: linear-gradient(to bottom, #78c5fd 0%, #2c8fdd 100%);
        background: -o-linear-gradient(top, #78c5fd 0%, #2c8fdd 100%);
        background: -ms-linear-gradient(top, #78c5fd 0%, #2c8fdd 100%);
        background: -moz-linear-gradient(top, #78c5fd 0%, #2c8fdd 100%);
        background: -webkit-linear-gradient(top, #78c5fd 0%, #2c8fdd 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#78c5fd', endColorstr='#2c8fdd', GradientType=0);
        box-shadow: inset 0 1px rgba(255,255,255,0.5), 0 1px rgba(0,0,0,0.5);
        line-height: 39px;
        text-shadow: 0 1px rgba(0,0,0,0.5);
        color: #fff;
    }
    .pcss3t-theme-4 > label:hover {
        background: #90cffc;
        background: linear-gradient(to bottom, #90cffc 0%, #439bde 100%);
        background: -o-linear-gradient(top, #90cffc 0%, #439bde 100%);
        background: -ms-linear-gradient(top, #90cffc 0%, #439bde 100%);
        background: -moz-linear-gradient(top, #90cffc 0%, #439bde 100%);
        background: -webkit-linear-gradient(top, #90cffc 0%, #439bde 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#90cffc', endColorstr='#439bde', GradientType=0);
    }
    .pcss3t-theme-4 > input:checked + label {
        top: 1px;
        background: #5f9dc9;
        background: linear-gradient(to bottom, #5f9dc9 0%, #2270ab 100%);
        background: -o-linear-gradient(top, #5f9dc9 0%, #2270ab 100%);
        background: -ms-linear-gradient(top, #5f9dc9 0%, #2270ab 100%);
        background: -moz-linear-gradient(top, #5f9dc9 0%, #2270ab 100%);
        background: -webkit-linear-gradient(top, #5f9dc9 0%, #2270ab 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#5f9dc9', endColorstr='#2270ab', GradientType=0);
        box-shadow: inset 0 1px 1px rgba(0,0,0,0.5), 0 1px rgba(255,255,255,0.5);
        text-shadow: none;
    }
    .pcss3t-theme-4 > ul {
        border-radius: 5px;
        box-shadow: 0 2px 2px rgba(0,0,0,0.3);
    }
    @media screen and (max-width: 767px) {
        .pcss3t-theme-4 > label {
            margin-right: 0;
        }
    }


    /**/
    /* theme 5 */
    /**/
    .pcss3t-theme-5 {
        padding: 15px;
        border-radius: 5px;
        background: #ad6395;
        background: linear-gradient(to right, #ad6395 0%, #a163ad 100%);
        background: -o-linear-gradient(left, #ad6395 0%, #a163ad 100%);
        background: -ms-linear-gradient(left, #ad6395 0%, #a163ad 100%);
        background: -moz-linear-gradient(left, #ad6395 0%, #a163ad 100%);
        background: -webkit-linear-gradient(left, #ad6395 0%, #a163ad 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#5f9dc9', endColorstr='#a163ad', GradientType=1);
    }
    .pcss3t-theme-5 > label {
        margin-right: 10px;
        margin-bottom: 15px;
        background: none;
        border-radius: 5px;
        text-align: center;
        color: #fff;
        opacity: 1;
    }
    .pcss3t-theme-5 > label:hover {
        background: rgba(255,255,255,0.15);
    }
    .pcss3t-theme-5 > input:checked + label {
        background: rgba(255,255,255,0.3);
        color: #000;
    }
    .pcss3t-theme-5 > input:checked + label:after {
        content: '';
        position: absolute;
        top: 100%;
        left: 50%;
        margin-top: 10px;
        margin-left: -6px;
        border-right: 6px solid transparent;
        border-bottom: 6px solid #fff;
        border-left: 6px solid transparent;
    }
    .pcss3t-theme-5 > ul {
        margin: 0 -15px -15px;
        border-radius: 0 0 5px 5px;
        box-shadow: none;
    }
    @media screen and (max-width: 767px) {
        .pcss3t-theme-5 > input:checked + label:after {
            display: none;
        }
    }


    /*----------------------------------------------------------------------------*/
    /*                               CUSTOMIZATION                                */
    /*----------------------------------------------------------------------------*/

    /**/
    /* height */
    /**/
    .pcss3t > ul,
    .pcss3t > ul > li {
        height: 1000px;
    }

    #profile_create_space{
        margin-top: 100px;
    }

    form  {
        /*margin:  10px auto;*/
        padding:  10px 20px;
        background:  #f4f7f8;
        border-radius:  8px;
    }

    .smart_jobs_btn{
        padding: 6px;
        font-size: 14px;
        background-color: white;
        color: black;
        border: 2px solid #008CBA;
        border-radius: 5px;
    }

    .smart_jobs_btn:hover {
        background-color: #008CBA;
        color: white;
    }

    #create_basic_profile_button{
        padding: 6px;
        font-size: 14px;
        background-color: white;
        color: black;
        border: 2px solid #008CBA;
        border-radius: 5px;
    }

    #create_basic_profile_button:hover {
        background-color: #008CBA;
        color: white;
    }
    .form-check-input{
        margin-left: 0px !Important;
    }

    #ol_table select{
        width: 100%;
        height: 30px;
    }

    #al_table select{
        width: 100%;
        height: 30px;
    }

    .add_row_buttons a{
        padding: 6px;
        font-size: 14px;
        background-color: white;
        color: black;
        border: 2px solid #008CBA;
        border-radius: 5px;
        text-decoration: none!Important;
    }

    .add_row_buttons a:hover{
        background-color: #008CBA;
        color: white;
    }

    .proff_save_btn{
        margin-top: 100px;
        padding: 10px;
    }

    .smart_job_portal_button{
        margin-top: 60px;
        margin-left: 60px;
    }


    /*#basic_profile_form{*/
        /*background-color: #F4F7F8;*/
    /*}*/
</style>
<body>
<div id="profile_create_space">
<div class="page">

    <?php

        if(!empty( $prof_status)){
            $proof_step = $prof_status;
            if($proof_step == 0){
                $tab1_check = "checked";
                $tab2_check = "";
                $tab3_check = "";
                $tab4_check = "";
            }else if($proof_step == 1){
                $tab1_check = "";
                $tab2_check = "checked";
                $tab3_check = "";
                $tab4_check = "";
            }else if($proof_step == 2){
                $tab1_check = "";
                $tab2_check = "";
                $tab3_check = "checked";
                $tab4_check = "";
            }else if($proof_step == 3){
                $tab1_check = "";
                $tab2_check = "";
                $tab3_check = "";
                $tab4_check = "checked";
            }
        }else{
            $tab1_check = "checked";
            $tab2_check = "";
            $tab3_check = "";
            $tab4_check = "";
        }


    ?>
    <!-- tabs -->
    <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
        <input type="radio" name="pcss3t" <?php echo $tab1_check ?>  id="tab1"class="tab-content-first">
        <label for="tab1"><i class="icon-user"></i>Create Basic Profile</label>

        <input type="radio" name="pcss3t" <?php echo $tab2_check ?> id="tab2" class="tab-content-2">
        <label for="tab2"><i class="icon-file-alt"></i>Educational Qualifications</label>

        <input type="radio" name="pcss3t" id="tab3" <?php echo $tab3_check?> class="tab-content-3">
        <label for="tab3"><i class="icon-file-alt"></i>Professional Qualifications</label>

        <input type="radio" name="pcss3t" id="tab5" <?php echo $tab4_check?> class="tab-content-last">
        <label for="tab5"><i class="icon-file-alt"></i>Preferences</label>

        <ul>
            <li class="tab-content tab-content-first typography">
                <div class="row">
                    <div class="col-md-12">

                        <form id="basic_profile_form" method="post">
                            <fieldset>
                                <legend><span class="number">1. </span>Enter Your basic Details</legend>
                                <div class="form-group">
                                    <label for="name">Full Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                                </div>

                                <div class="form-group">
                                    <label for="nic">NIC:</label>
                                    <input type="text" class="form-control" id="nic" name="nic" placeholder="Enter your NIC">
                                </div>

                                <div class="form-group">
                                    <label>Gender:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone" >
                                </div>

                                <div class="form-group">
                                    <label for="mail">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" value="<?php echo $_SESSION['name'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="birthdate">Birthdate:</label>
                                    <input type="text" class="form-control" id="dob" name="dob" placeholder="Select your birthdate">
                                </div>

                                <div class="form-group">
                                    <label for="profile_img">Profile Picture:</label><br>
                                    <input type="file" id="profile_img" name="profile_img">
                                </div>

                                <div class="form-group">
                                    <label for="cv">CV:</label><br>
                                    <input type="file" name="upload_file_cv" id="upload_file_cv">
                                </div>

                            </fieldset>
                            <button id="create_basic_profile_button">Create Basic Profile </button>
                        </form>
                        <br>
                        <div class="col-md-12">
                            <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
                                Warning! Some messages shows here..
                            </div>
                        </div>
                    </div>
                </div>
               </li>

            <li class="tab-content tab-content-2 typography">
                <div class="row" style="text-align: center">
                    <!-- Second form -->
                    <div class="col-md-12">
                        <form id="profile_form2" method="post">
                            <fieldset>
                                <legend><span class="number">2. </span>Acadamic Qualifications</legend>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="exampleButton" style="float:right">Ordinary Level:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_ol" style="float:left; margin-bottom: 20px">+ Add</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="exampleButton"  style="float:right">Advanced Level:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_al" style="float:left; margin-bottom: 20px">+ Add</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="exampleButton" style="float:right">Higher National Diploma:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_hnd" style="float:left; margin-bottom: 20px">+ Add</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="exampleButton" style="float:right">Bacholers Level:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_bacheler" style="float:left; margin-bottom: 20px">+ Add</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="exampleButton" style="float:right">Masters Level:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_masters" style="float:left; margin-bottom: 20px">+ Add</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="exampleButton" style="float:right">PHD or Upper Level:</label>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_phd" style="float:left; margin-bottom: 20px">+ Add</button>
                                    </div>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-primary smart_jobs_btn" id="save_">Submit</button>
                        </form>
                        <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
                            Warning! Some messages shows here..
                        </div>
                    </div>
<!--                    <input type="text" id="hidden_profile_id" name="hidden_profile_id">-->

                </div>
             </li>

            <li class="tab-content tab-content-3 typography">
                <form method="post" id="professional_q_form">
                    <div class="container">
                        <legend><span class="number">3. </span>Professional Qualifications</legend>
                    <table class="table table-bordered table-hover" id="qualification_table">
                        <thead>
                        <tr>
                            <th class="text-center">
                                Designation
                            </th>
                            <th class="text-center">
                                Company
                            </th>
                            <th class="text-center">
                                Duration(Years)
                            </th>

                        </tr>
                        </thead>
                        <tbody id="medical_table_body">

                        <tr id='addr0' class="rowval">
                            <td>
                                <input type="text" name="designation[]" id="designation" placeholder="Recent Designation" class="form-control designation" value=""/>
                            </td>
                            <td>
                                <input type="text" name="company_name[]" id="company_name" placeholder="Recent Company" class="form-control company_name" value=""/>
                            </td>
                            <td>
                                <input type="text" name="duration[]" id="duration" placeholder="Duration" class="form-control duration" value=""/>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                        <div class="add_row_buttons">
                            <a id="add_row_q" class="btn btn-default pull-left">Add Past Companies</a>
                            <a id='delete_row_q' class="pull-right btn btn-default">Clear All</a>
                        </div>
                    </div>
                    <div class="row proff_save_btn">
                        <button type="submit" class="btn btn-primary" id="save_qualify_btn">Save Professional Qualifications</button>
                    </div>
                </form>
                <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
                    Warning! Some messages shows here..
                </div>
            </li>

            <li class="tab-content tab-content-last typography">
                <div class="typography">
                    <div class="col-md-12">
                        <form id="preference_form" method="post">
                            <legend><span class="number">4. </span>Preferences</legend>

                            <fieldset class="form-group">
                                <div class="row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Job Type</label>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="job_type" id="job_type1" value="full_time" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Full Time
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="job_type" id="job_type2" value="part_time">
                                            <label class="form-check-label" for="gridRadios2">
                                                Part Time
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <div class="row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Job Nature</label>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="job_nature" id="job_nature1" value="onsite" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                On site
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="job_nature" id="job_nature2" value="remote">
                                            <label class="form-check-label" for="gridRadios2">
                                                Remote
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

<!--                            <div class="form-group row">-->
<!--                                <div class="col-sm-2">Checkbox</div>-->
<!--                                <div class="col-sm-10">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="gridCheck1">-->
<!--                                        <label class="form-check-label" for="gridCheck1">-->
<!--                                            Example checkbox-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Job Location (District)</label>
                                <div class="col-sm-10">
                                <select id="jb_district" name="jb_district" class="form-control">
                                    <option value="">Select District</option>
                                    <?php foreach($all_districts as $item){
                                        $d_id = $item->district_id ;
                                        $d_name = $item->district;?>
                                        <option value="<?php echo $d_id ?>"><?php echo $d_name ?></option>
                                    <?php }?>
                                </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Expected Salary(Max - Rs)</label>
                                <div class="col-sm-10">
                                    <input type="" class="form-control" id="exp_salary" name="exp_salary" placeholder="Expected Salary">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" id="save_preference">Save Preferences</button>
                                </div>
                            </div>
                        </form>
                        <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
                            Warning! Some messages shows here..
                        </div>
                    </div>
                   </div>
            </li>
        </ul>
    </div>
    <!--/ tabs -->
</div>
</div>

<!-------- ALL MODALS HERE ---------------------->

<!-- OLs result add -->
<!-- Modal -->
<div id="myModal_ol" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="width:50px">&times;</button>
            </div>
            <div class="modal-body">
                <form id="ol_profile_form" method="post">
                <h6>Insert the results of the main subjects</h6>
                <table class="table table-bordered table-hover" id="ol_table">
                    <thead>
                    <tr>
                        <th class="text-center">
                            Subject
                        </th>
                        <th class="text-center">
                            Result
                        </th>

                    </tr>
                    </thead>
                    <tbody id="medical_table_body">
                    <tr id='' class="rowval">
                        <td>
                            <label for="mail">Mathematics</label>
                        </td>
                        <td>
                            <select name="maths" id="maths">
                                <option value="">Select the Result</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="C">S</option>
                                <option value="C">F</option>
                            </select>
                        </td>
                    </tr>
                    <tr id='' class="rowval">
                        <td>
                            <label for="mail">English</label>
                        </td>
                        <td>
                            <select name="english" id="english">
                                <option value="">Select the Result</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="C">S</option>
                                <option value="C">F</option>
                            </select>
                        </td>
                    </tr>
                    <tr id='' class="rowval">
                        <td>
                            <label for="mail">Science</label>
                        </td>
                        <td>
                            <select name="science" id="science">
                                <option value="">Select the Result</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="C">S</option>
                                <option value="C">F</option>
                            </select>
                        </td>
                    </tr>
                    <tr id='' class="rowval">
                        <td>
                            <label for="mail">History</label>
                        </td>
                        <td>
                            <select name="history" id="history">
                                <option value="">Select the Result</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="C">S</option>
                                <option value="C">F</option>
                            </select>
                        </td>
                    </tr>
                    <tr id='' class="rowval">
                        <td>
                            <label for="mail">Sinhala/Tamil</label>
                        </td>
                        <td>
                            <select name="language" id="language">
                                <option value="">Select the Result</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="C">S</option>
                                <option value="C">F</option>
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <button class="smart_job_portal_button" type="submit" id="save_ols"> Save</button>
            </form>
            </div>
            <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
                Warning! Some messages shows here..
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal 2-->
<div id="myModal_hnd" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="width:50px">&times;</button>
            </div>
            <div class="modal-body">
                <h6>Insert the results of the HND  s</h6>
                <form method="post" id="hnd_form">
                    <table class="table table-bordered table-hover" id="hnd_table">
                        <thead>
                        <tr>
                            <th class="text-center">
                                Title
                            </th>
                            <th class="text-center">
                                Institute
                            </th>

                        </tr>
                        </thead>
                        <tbody id="medical_table_body">

                        <tr id='addr0' class="rowval">
                            <td>
                                <input type="text" name="hnd_name[]" id="hnd_name" placeholder="HND Name" class="form-control hnd_name" value=""/>
                            </td>
                            <td>
                                <input type="text" name="hnd_institute[]" id="hnd_institute" placeholder="HND Institute" class="form-control hnd_institute" value=""/>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </form>
                <a id="add_row_hnd" class="btn btn-default pull-left">Add Row</a><a id='delete_row_hnd' class="pull-right btn btn-default">Clear All</a>


                <button class="smart_job_portal_button" type="submit" id="save_hnd"> Save</button>
            </div>
            <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
                Warning! Some messages shows here..
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal 3-->
<div id="myModal_al" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="width:50px">&times;</button>
            </div>
            <div class="modal-body">
                <h6>Insert the results of the Advanced Level</h6>
                <form id="al_form" methos="post">
                <table class="table table-bordered table-hover" id="al_table">
                    <select name="Stream" id="Stream">
                        <option value="">Select the stream</option>
                        <option value="Mathematics">Mathematics</option>
                        <option value="Biology">Biology</option>
                        <option value="Commerce">Commerce</option>
                        <option value="Technology">Technology</option>
                        <option value="Arts">Arts</option>
                    </select>

                    <thead>
                    <tr>
                        <th class="text-center">
                            Subject
                        </th>
                        <th class="text-center">
                            Result
                        </th>

                    </tr>
                    </thead>
                    <tbody id="medical_table_body">
                    <tr id='' class="rowval">
                        <td>
                            <input for="al" id="subject1" name ="subject1" value="">
                        </td>
                        <td>
                            <select name="subject1_result" id="subject1_result">
                                <option value="">Select the Result</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="S">S</option>
                                <option value="F">F</option>
                            </select>
                        </td>
                    </tr>
                    <tr id='' class="rowval">
                        <td>
                            <input for="ol" name="subject2" id="subject2" value="">
                        </td>
                        <td>
                            <select name="subject2_result" id="subject2_result">
                                <option value="">Select the Result</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="S">S</option>
                                <option value="F">F</option>
                            </select>
                        </td>
                    </tr>
                    <tr id='' class="rowval">
                        <td>
                            <input for="ol" name="subject3" id="subject3" value="">
                        </td>
                        <td>
                            <select  name="subject3_result" id="subject3_result">
                                <option value="">Select the Result</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="S">S</option>
                                <option value="F">F</option>
                            </select>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </form>
                <button class="smart_job_portal_button" type="submit" id="save_als"> Save</button>
            </div>
            <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
                Warning! Some messages shows here..
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal 4-->
<div id="myModal_bacheler" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="width:50px">&times;</button>
            </div>
            <div class="modal-body">
                <h6>Insert the results of the bachelor's</h6>
                <form method="post" id="bachler_form">
                <table class="table table-bordered table-hover" id="bachelors_table">
                    <thead>
                    <tr>
                        <th class="text-center">
                            Title
                        </th>
                        <th class="text-center">
                            Institute
                        </th>

                    </tr>
                    </thead>
                    <tbody id="medical_table_body">

                    <tr id='addr0' class="rowval">
                        <td>
                            <input type="text" name="degree_name[]" id="degree_name" placeholder="Degree Name" class="form-control degree_name" value=""/>
                        </td>
                        <td>
                            <input type="text" name="degree_institute[]" id="degree_institute" placeholder="Institute" class="form-control degree_institute" value=""/>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </form>
                <a id="add_row_bcheler" class="btn btn-default pull-left">Add Row</a>
                <a id='delete_row_bachler' class="pull-right btn btn-default">Clear All</a>


                <button class="smart_job_portal_button" type="submit" id="save_bachelers"> Save</button>
            </div>
            <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
                Warning! Some messages shows here..
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal 5-->
<div id="myModal_masters" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="width:50px">&times;</button>
            </div>
            <div class="modal-body">
                <h6>Insert the results of the Master's</h6>
                <form id="masters_form" method="post">
                <table class="table table-bordered table-hover" id="masters_table">
                    <thead>
                    <tr>
                        <th class="text-center">
                            Title
                        </th>
                        <th class="text-center">
                            Institute
                        </th>

                    </tr>
                    </thead>
                    <tbody id="medical_table_body">

                    <tr id='addr0' class="rowval">
                        <td>
                            <input type="text" name="masters_name[]" id="masters_name" placeholder="Masters Degree Name" class="form-control masters_name" value=""/>
                        </td>
                        <td>
                            <input type="text" name="masters_degree_institute[]" id="masters_degree_institute" placeholder="Institute" class="form-control masters_degree_institute" value=""/>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </form>
                <a id="add_row_masters" class="btn btn-default pull-left">Add Row</a>
                <a id='delete_row_masrter' class="pull-right btn btn-default">Clear All</a>
                <button class="smart_job_portal_button" type="submit" id="save_masters"> Save</button>

            </div>
            <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
                Warning! Some messages shows here..
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal 6-->
<div id="myModal_phd" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="width:50px">&times;</button>
            </div>
            <div class="modal-body">
                <h6>Insert the results of the PHD's or Higher</h6>
                <form id="phd_form" method="post">
                <table class="table table-bordered table-hover" id="phd_table">
                    <thead>
                    <tr>
                        <th class="text-center">
                            Title
                        </th>
                        <th class="text-center">
                            Institute
                        </th>

                    </tr>
                    </thead>
                    <tbody id="medical_table_body">

                    <tr id='addr0' class="rowval">
                        <td>
                            <input type="text" name="phd_name[]" id="phd_name" placeholder="PHD Degree Name" class="form-control masters_name" value=""/>
                        </td>
                        <td>
                            <input type="text" name="phd_degree_institute[]" id="phd_degree_institute" placeholder="Institute" class="form-control phd_degree_institute" value=""/>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </form>
                <a id="add_row_phd" class="btn btn-default pull-left">Add Row</a>
                <a id='delete_row_phd' class="pull-right btn btn-default">Clear All</a>


                <button class="smart_job_portal_button" type="submit" id="save_phd"> Save</button>
            </div>
            <div class="alert alert-info form-alertbox" role="alert" style="display:none ;">
                Warning! Some messages shows here..
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
            </div>
        </div>

    </div>
</div>



</body>
<script src="<?php echo base_url("assets/js/app_js/profile.js")?>"></script>
<script>
    $(document).ready(function () {
        // Calculate the date 18 years ago from today
        var today = new Date();
        var eighteenYearsAgo = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());

        // Initialize the datepicker with the maxDate option
        $('#dob').datepicker({
            format: 'mm/dd/yyyy',
            endDate: eighteenYearsAgo,
            autoclose: true
        });
    });

    //end of document ready

    var i = $('#hnd_table tr').length;

    $("#add_row_hnd").click(function () {
        $('#hnd_table').append("<tr id='addr" + (i + 1) + "' class='rowval'><td><input  name='hnd_name[]' id='hnd_name" + i + "'  value='' type='text' placeholder='HND Name'  class='form-control input-md hnd_name'></td><td><input  name='hnd_institute[]' id='hnd_institute" + i + "'  value='' type='text' placeholder='HND Instutute'  class='form-control input-md hnd_institute'></td></tr>");

    });

    $("#delete_row_hnd").click(function () { // remove rows from the detail table.
        $("#hnd_table tbody").html('');
        $('#hnd_table').append("<tr id='addr" + (i + 1) + "' class='rowval'><td><input  name='hnd_name[]' id='hnd_name" + i + "'  value='' type='text' placeholder='HND Name'  class='form-control input-md hnd_name'></td><td><input  name='hnd_institute[]' id='hnd_institute" + i + "'  value='' type='text' placeholder='HND Instutute'  class='form-control input-md hnd_institute'></td></tr>");

    });

    //end of HND table

    var j = $('#bachelors_table tr').length;

    $("#add_row_bcheler").click(function () {
        $('#bachelors_table').append("<tr id='addr" + (j + 1) + "' class='rowval'><td><input  name='degree_name[]' id='degree_name" + j + "'  value='' type='text' placeholder='Degree Title'  class='form-control input-md degree_name'></td><td><input  name='degree_institute[]' id='degree_institute" + j + "'  value='' type='text' placeholder='Instutute'  class='form-control input-md institute'></td></tr>");

    });

    $("#delete_row_bachler").click(function () { // remove rows from the detail table.
        $("#bachelors_table tbody").html('');
        $('#bachelors_table').append("<tr id='addr" + (j + 1) + "' class='rowval'><td><input  name='degree_name[]' id='degree_name" + j + "'  value='' type='text' placeholder='Degree Title'  class='form-control input-md degree_name'></td><td><input  name='degree_institute[]' id='degree_institute" + j + "'  value='' type='text' placeholder='Instutute'  class='form-control input-md institute'></td></tr>");

    });

    //end of bacheler table

    var k = $('#masters_table tr').length;


    $("#add_row_masters").click(function () {
        $('#masters_table').append("<tr id='addr" + (k + 1) + "' class='rowval'><td><input  name='masters_name[]' id='masters_name" + k + "'  value='' type='text' placeholder='Masters Title'  class='form-control input-md degree_name'></td><td><input  name='masters_degree_institute[]' id='masters_degree_institute" + k + "'  value='' type='text' placeholder='Instutute'  class='form-control input-md institute'></td></tr>");
    });

    $("#delete_row_masrter").click(function () { // remove rows from the detail table.
        $("#masters_table tbody").html('');
        $('#masters_table').append("<tr id='addr" + (k + 1) + "' class='rowval'><td><input  name='masters_name[]' id='masters_name" + k + "'  value='' type='text' placeholder='Masters Title'  class='form-control input-md degree_name'></td><td><input  name='masters_degree_institute[]' id='masters_degree_institute" + k + "'  value='' type='text' placeholder='Instutute'  class='form-control input-md institute'></td></tr>");

    });

    var n = $('#phd_table tr').length;

    $("#add_row_phd").click(function () {
        $('#phd_table').append("<tr id='addr" + (n + 1) + "' class='rowval'><td><input  name='phd_name[]' id='phd_name" + n + "'  value='' type='text' placeholder='Qualification Title'  class='form-control input-md Qualification_name'></td><td><input  name='phd_degree_institute[]' id='phd_degree_institute" + n + "'  value='' type='text' placeholder='Instutute'  class='form-control input-md institute'></td></tr>");
    });

    $("#delete_row_phd").click(function () { // remove rows from the detail table.
        $("#phd_table tbody").html('');
        $('#phd_table').append("<tr id='addr" + (n + 1) + "' class='rowval'><td><input  name='phd_name[]' id='phd_name" + n + "'  value='' type='text' placeholder='Qualification Title'  class='form-control input-md Qualification_name'></td><td><input  name='phd_degree_institute[]' id='phd_degree_institute" + n + "'  value='' type='text' placeholder='Instutute'  class='form-control input-md institute'></td></tr>");

    });

    var m = $('#qualification_table tr').length;

    $("#add_row_q").click(function () {
        $('#qualification_table').append("<tr id='addr" + (m + 1) + "' class='rowval'><td><input  name='designation[]' id='designation" + m + "'  value='' type='text' placeholder='Designation'  class='form-control input-md designation'></td><td><input  name='company_name[]' id='company_name" + m + "'  value='' type='text' placeholder='Company'  class='form-control input-md company_name'></td><td><input  name='duration[]' id='duration" + m + "'  value='' type='text' placeholder='Duration'  class='form-control input-md duration'></td></tr>");
    });

    $("#delete_row_q").click(function () { // remove rows from the detail table.
        $("#qualification_table tbody").html('');
        $('#qualification_table').append("<tr id='addr" + (m + 1) + "' class='rowval'><td><input  name='designation[]' id='designation" + m + "'  value='' type='text' placeholder='Designation'  class='form-control input-md designation'></td><td><input  name='company_name[]' id='company_name" + m + "'  value='' type='text' placeholder='Company'  class='form-control input-md company_name'></td><td><input  name='duration[]' id='duration" + m + "'  value='' type='text' placeholder='Duration'  class='form-control input-md duration'></td></tr>");
    });

</script>
