<?php
$office_name = esc_html(get_theme_mod('office_name', '時國司法書士事務所'));
$phone = esc_html(get_theme_mod('phone_number', '0586-25-0366'));
$phone_tel = esc_attr(get_theme_mod('phone_tel', '0586250366'));
$address = esc_html(get_theme_mod('office_address', '日本、〒491-0858 愛知県一宮市栄２丁目２−５'));
?>

  <footer class="site-footer">
    <div class="container footer-inner">
      <div class="footer-name"><?php echo $office_name; ?></div>
      <div class="footer-info">
        <span><?php echo $address; ?></span>
        <a href="tel:<?php echo $phone_tel; ?>" aria-label="<?php echo $office_name; ?>に電話する <?php echo $phone; ?>">TEL: <?php echo $phone; ?></a>
        <span><?php echo esc_html(get_theme_mod('footer_hours_text', '営業時間はお問い合わせください')); ?></span>
      </div>
      <div class="footer-divider"></div>
      <div class="footer-bottom">
        <span>&copy; <?php echo date('Y'); ?> <?php echo $office_name; ?> All Rights Reserved.</span>
      </div>
    </div>
  </footer>

  <aside class="mobile-cta" role="complementary" aria-label="予約・お問い合わせ">
    <div class="mobile-cta-inner">
      <a class="mobile-cta-btn mobile-cta-phone" href="tel:<?php echo $phone_tel; ?>" aria-label="<?php echo $office_name; ?>に電話する <?php echo $phone; ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        <span>電話する</span>
      </a>
      <a class="mobile-cta-btn mobile-cta-book" href="#hours">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        <span>受付時間</span>
      </a>
    </div>
  </aside>

  <script>
    (function(){
      var toggle=document.querySelector('[data-menu-toggle]');
      var backdrop=document.querySelector('[data-nav-close]');
      var links=document.querySelectorAll('.site-nav a');
      function closeNav(){document.body.classList.remove('nav-open');if(toggle)toggle.setAttribute('aria-expanded','false');}
      function openNav(){document.body.classList.add('nav-open');if(toggle)toggle.setAttribute('aria-expanded','true');}
      if(toggle)toggle.addEventListener('click',function(){document.body.classList.contains('nav-open')?closeNav():openNav();});
      if(backdrop)backdrop.addEventListener('click',closeNav);
      links.forEach(function(l){l.addEventListener('click',closeNav);});
      document.addEventListener('keydown',function(e){if(e.key==='Escape')closeNav();});
      window.addEventListener('resize',function(){if(window.innerWidth>960)closeNav();});
      document.querySelectorAll('[data-gallery-track]').forEach(function(track){
        var slides=track.querySelectorAll('.gallery-slide');
        var dotsWrap=track.parentElement.querySelector('[data-gallery-dots]');
        var prevBtn=track.parentElement.querySelector('[data-gallery-prev]');
        var nextBtn=track.parentElement.querySelector('[data-gallery-next]');
        if(!slides.length)return;
        var perView=window.innerWidth<=720?1:window.innerWidth<=960?2:3;
        var total=Math.max(1,slides.length-perView+1);
        var idx=0;
        if(dotsWrap){for(var i=0;i<total;i++){var d=document.createElement('span');d.className='gallery-dot'+(i===0?' is-active':'');dotsWrap.appendChild(d);}}
        function go(n){idx=Math.max(0,Math.min(n,total-1));slides[idx].scrollIntoView({behavior:'smooth',block:'nearest',inline:'start'});updateDots();}
        function updateDots(){if(!dotsWrap)return;var dots=dotsWrap.querySelectorAll('.gallery-dot');dots.forEach(function(d,i){d.classList.toggle('is-active',i===idx);});}
        if(prevBtn)prevBtn.addEventListener('click',function(){go(idx-1);});
        if(nextBtn)nextBtn.addEventListener('click',function(){go(idx+1);});
        var startX;track.addEventListener('touchstart',function(e){startX=e.touches[0].clientX;},{passive:true});
        track.addEventListener('touchend',function(e){if(!startX)return;var diff=startX-e.changedTouches[0].clientX;if(Math.abs(diff)>40){diff>0?go(idx+1):go(idx-1);}startX=null;},{passive:true});
      });
      var els=document.querySelectorAll('.animate-on-scroll');
      if('IntersectionObserver' in window){
        var obs=new IntersectionObserver(function(entries){
          entries.forEach(function(e){if(e.isIntersecting){e.target.classList.add('is-visible');obs.unobserve(e.target);}});
        },{threshold:0.12,rootMargin:'0px 0px -40px 0px'});
        els.forEach(function(el){obs.observe(el);});
      }else{els.forEach(function(el){el.classList.add('is-visible');});}
    })();
  </script>
  <?php wp_footer(); ?>
</body>
</html>
