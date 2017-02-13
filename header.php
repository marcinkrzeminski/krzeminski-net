<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package krzeminski.net
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <script>function loadFont(a, b, c, d) { function e() { if (!window.FontFace) return !1; var a = new FontFace("t", 'url("data:application/font-woff,") format("woff")', {}), b = a.load(); try { b.then(null, function () { }) } catch (c) { } return "loading" === a.status } var f = navigator.userAgent, g = !window.addEventListener || f.match(/(Android (2|3|4.0|4.1|4.2|4.3))|(Opera (Mini|Mobi))/) && !f.match(/Chrome/); if (!g) { var h = {}; try { h = localStorage || {} } catch (i) { } var j = "x-font-" + a, k = j + "url", l = j + "css", m = h[k], n = h[l], o = document.createElement("style"); if (o.rel = "stylesheet", document.head.appendChild(o), !n || m !== b && m !== c) { var p = c && e() ? c : b, q = new XMLHttpRequest; q.open("GET", p), q.onload = function () { q.status >= 200 && q.status < 400 && (h[k] = p, h[l] = q.responseText, d || (o.textContent = q.responseText)) }, q.send() } else o.textContent = n } };loadFont('Fonts', '/wp-content/themes/krzeminski-net/fonts/web-fonts.css');</script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<svg style="position: absolute; width: 0; height: 0;" width="0" height="0" version="1.1"
     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  <defs>
    <symbol id="c-icon--linkedin" viewBox="0 0 1792 1792">
      <title>LinkedIn</title>
      <path d="M477 625v991h-330v-991h330zm21-306q1 73-50.5 122t-135.5 49h-2q-82 0-132-49t-50-122q0-74 51.5-122.5t134.5-48.5 133 48.5 51 122.5zm1166 729v568h-329v-530q0-105-40.5-164.5t-126.5-59.5q-63 0-105.5 34.5t-63.5 85.5q-11 30-11 81v553h-329q2-399 2-647t-1-296l-1-48h329v144h-2q20-32 41-56t56.5-52 87-43.5 114.5-15.5q171 0 275 113.5t104 332.5z"></path>
    </symbol>
    <symbol id="c-icon--github" viewBox="0 0 1792 1792">
      <title>Github</title>
      <path d="M1664 896q0 251-146.5 451.5t-378.5 277.5q-27 5-39.5-7t-12.5-30v-211q0-97-52-142 57-6 102.5-18t94-39 81-66.5 53-105 20.5-150.5q0-121-79-206 37-91-8-204-28-9-81 11t-92 44l-38 24q-93-26-192-26t-192 26q-16-11-42.5-27t-83.5-38.5-86-13.5q-44 113-7 204-79 85-79 206 0 85 20.5 150t52.5 105 80.5 67 94 39 102.5 18q-40 36-49 103-21 10-45 15t-57 5-65.5-21.5-55.5-62.5q-19-32-48.5-52t-49.5-24l-20-3q-21 0-29 4.5t-5 11.5 9 14 13 12l7 5q22 10 43.5 38t31.5 51l10 23q13 38 44 61.5t67 30 69.5 7 55.5-3.5l23-4q0 38 .5 89t.5 54q0 18-13 30t-40 7q-232-77-378.5-277.5t-146.5-451.5q0-209 103-385.5t279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path>
    </symbol>
    <symbol id="c-icon--twitter" viewBox="0 0 1792 1792">
      <title>Twitter</title>
      <path d="M1684 408q-67 98-162 167 1 14 1 42 0 130-38 259.5t-115.5 248.5-184.5 210.5-258 146-323 54.5q-271 0-496-145 35 4 78 4 225 0 401-138-105-2-188-64.5t-114-159.5q33 5 61 5 43 0 85-11-112-23-185.5-111.5t-73.5-205.5v-4q68 38 146 41-66-44-105-115t-39-154q0-88 44-163 121 149 294.5 238.5t371.5 99.5q-8-38-8-74 0-134 94.5-228.5t228.5-94.5q140 0 236 102 109-21 205-78-37 115-142 178 93-10 186-50z"></path>
    </symbol>
    <symbol id="c-icon--youtube" viewBox="0 0 1792 1792">
      <title>YouTube</title>
      <path d="M1099 1244v211q0 67-39 67-23 0-45-22v-301q22-22 45-22 39 0 39 67zm338 1v46h-90v-46q0-68 45-68t45 68zm-966-218h107v-94h-312v94h105v569h100v-569zm288 569h89v-494h-89v378q-30 42-57 42-18 0-21-21-1-3-1-35v-364h-89v391q0 49 8 73 12 37 58 37 48 0 102-61v54zm429-148v-197q0-73-9-99-17-56-71-56-50 0-93 54v-217h-89v663h89v-48q45 55 93 55 54 0 71-55 9-27 9-100zm338-10v-13h-91q0 51-2 61-7 36-40 36-46 0-46-69v-87h179v-103q0-79-27-116-39-51-106-51-68 0-107 51-28 37-28 116v173q0 79 29 116 39 51 108 51 72 0 108-53 18-27 21-54 2-9 2-58zm-608-913v-210q0-69-43-69t-43 69v210q0 70 43 70t43-70zm719 751q0 234-26 350-14 59-58 99t-102 46q-184 21-555 21t-555-21q-58-6-102.5-46t-57.5-99q-26-112-26-350 0-234 26-350 14-59 58-99t103-47q183-20 554-20t555 20q58 7 102.5 47t57.5 99q26 112 26 350zm-998-1276h102l-121 399v271h-100v-271q-14-74-61-212-37-103-65-187h106l71 263zm370 333v175q0 81-28 118-37 51-106 51-67 0-105-51-28-38-28-118v-175q0-80 28-117 38-51 105-51 69 0 106 51 28 37 28 117zm335-162v499h-91v-55q-53 62-103 62-46 0-59-37-8-24-8-75v-394h91v367q0 33 1 35 3 22 21 22 27 0 57-43v-381h91z"></path>
    </symbol>
    <symbol id="c-icon--codepen" viewBox="0 0 1792 1792">
      <title>Codepen</title>
      <path d="M216 1169l603 402v-359l-334-223zm-62-144l193-129-193-129v258zm819 546l603-402-269-180-334 223v359zm-77-493l272-182-272-182-272 182zm-411-275l334-223v-359l-603 402zm960 93l193 129v-258zm-138-93l269-180-603-402v359zm485-180v546q0 41-34 64l-819 546q-21 13-43 13t-43-13l-819-546q-34-23-34-64v-546q0-41 34-64l819-546q21-13 43-13t43 13l819 546q34 23 34 64z"></path>
    </symbol>
  </defs>
</svg>
<div class="wrapper">
  
  <header class="c-site-header" role="banner">
    
    <nav class="c-site-nav" role="navigation">
      <a class="c-site-nav__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"
         rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <?php wp_nav_menu( array(
        'container'      => false,
        'menu_id'        => '',
        'theme_location' => 'primary',
        'menu_class'     => 'c-site-nav__list'
      ) ); ?>
      <div class="c-social">
        <a class="c-social__link" href="https://www.linkedin.com/in/marcinkrzeminski" target="_blank"
           title="LinkedIn">
          <svg class="c-social__icon">
            <use xlink:href="#c-icon--linkedin"></use>
          </svg>
        </a>
        <a class="c-social__link" href="https://github.com/marcinkrzeminski" target="_blank" title="Github">
          <svg class="c-social__icon">
            <use xlink:href="#c-icon--github"></use>
          </svg>
        </a>
        <a class="c-social__link" href="https://twitter.com/krzeminskinet" target="_blank" title="Twitter">
          <svg class="c-social__icon">
            <use xlink:href="#c-icon--twitter"></use>
          </svg>
        </a>
        <a class="c-social__link" href="https://www.youtube.com/c/marcinkrzeminski" target="_blank" title="YouTube">
          <svg class="c-social__icon">
            <use xlink:href="#c-icon--youtube"></use>
          </svg>
        </a>
        <a class="c-social__link" href="http://codepen.io/marcinkrzeminski" target="_blank" title="CodePen">
          <svg class="c-social__icon">
            <use xlink:href="#c-icon--codepen"></use>
          </svg>
        </a>
      </div>
    </nav>
  
  </header>
  
  <div class="clearfix">
