<?php
require __DIR__.'/includes/bootstrap.php';
$rate = setting($pdo,'usd_rate','3000');
$services = $pdo->query('SELECT * FROM services WHERE active=1 ORDER BY sort_order,name_ar LIMIT 8')->fetchAll();
$categories = [
 ['Samsung','سامسونج','📱','Samsung FRP وUnlock وIMEI وFirmware'],['Xiaomi','شاومي','🟠','Mi Account وFRP وFirmware'],['iPhone','آيفون','','تشخيص وصيانة وإعدادات iPhone'],['Huawei & Honor','هواوي وهونر','🌺','Firmware وخدمات الأجهزة'],
 ['Tecno / Infinix / itel','تكنو وإنفنكس','📲','FRP وMDM وخدمات النظام'],['Nokia & Other Brands','نوكيا وشركات أخرى','🔧','خدمات متنوعة لمختلف الأجهزة'],['FRP Services','خدمات FRP','🔐','فحص وخدمات FRP المصرح بها'],['IMEI & Network','IMEI والشبكات','📡','فحص الشبكة وأهلية فك القفل'],
 ['MDM Services','خدمات MDM','⚙️','حلول إدارة الأجهزة المصرح بها'],['iCloud Services','خدمات iCloud','☁️','مساعدة المالك وإعداد الحساب'],['Unlock Services','فك القفل','🔓','فحص أهلية فتح الشبكة'],['Flashing & Firmware','تفليش وفيرموير','💾','ملفات وتحديثات السوفت وير'],
 ['Box & Dongle','بوكس ودونجل','🧰','تفعيل أدوات الصيانة والتراخيص'],['Software Licenses','تراخيص السوفت وير','🪪','تراخيص واشتراكات البرامج'],['Games & Gift Cards','الألعاب وبطاقات الهدايا','🎮','بطاقات رقمية وأكواد ألعاب'],['Tool Rental','تأجير الأدوات','🛠️','الوصول المؤقت للأدوات المدعومة'],
 ['Credit Services','خدمات الكريدت','💳','شراء وإدارة أرصدة الخدمات'],['Repair Services','الصيانة والتشخيص','🔩','تشخيص وإصلاح أعطال السوفت وير'],['GITAG','خدمات GITAG','🧩','فحص التوافق والخدمات المدعومة'],['Other Services','خدمات أخرى','✨','طلبات مخصصة وخدمات إضافية']
];
app_header('الرئيسية');
?>
<section class="hero-home">
 <div class="hero-copy"><span class="eyebrow"><i></i> MOBILE SOFTWARE • DIGITAL SERVICES</span><h1>كل خدمات السوفت وير<br><em>في مكان واحد</em></h1><p>مرحباً بك في Hani Software — منصة موثوقة لخدمات الهواتف والتراخيص والمنتجات الرقمية، بطلبات واضحة ومتابعة من حسابك.</p><div class="hero-actions"><a class="btn btn-red" href="/services.php">تصفح الخدمات <b>←</b></a><a class="btn btn-outline" href="/register.php">إنشاء حساب جديد</a></div><div class="hero-proof"><span>✦ أسعار واضحة</span><span>✦ متابعة الطلبات</span><span>✦ دعم فني مباشر</span></div></div>
 <div class="hero-art" aria-label="رسم توضيحي لهواتف ذكية"><div class="orbit orbit-one"></div><div class="orbit orbit-two"></div><div class="phone phone-back"><div class="phone-cam"></div></div><div class="phone phone-front"><div class="phone-screen"><span>H</span><small>HANI SOFTWARE</small></div></div><div class="hero-chip">✦ SECURE SERVICE</div><div class="hero-glow"></div></div>
 <div class="hero-side"><b>خدمات متنوعة</b><b>أسعار تنافسية</b><b>دعم فني</b><b>حساب آمن</b></div>
</section>
<section class="section-head"><div><span class="eyebrow">EXPLORE OUR CATALOG</span><h2>أقسام <em>الخدمات</em></h2><p>اختر القسم المناسب واستكشف الخدمات المتاحة.</p></div><a class="text-link" href="/services.php">عرض جميع الخدمات ←</a></section>
<div class="category-grid">
<?php foreach($categories as $i=>$c): ?><a class="category-card" href="/services.php?category=<?=rawurlencode($c[0])?>"><span class="category-icon"><?=h($c[2])?></span><span class="category-title"><?=h($c[1])?></span><small><?=h($c[3])?></small><b>استكشف القسم <i>←</i></b></a><?php endforeach; ?>
</div>
<section class="feature-row"><div class="promo-panel"><span class="promo-tag">HANI SOFTWARE</span><div class="promo-icon">♛</div><h2>خدماتك الرقمية<br><em>بخطوات أسهل</em></h2><p>أنشئ حسابك واحتفظ بطلباتك وسجل معاملاتك في مكان واحد.</p><a href="/register.php" class="btn btn-red">ابدأ الآن ←</a></div>
 <div class="popular-panel"><div class="section-head compact"><div><span class="eyebrow">HANDPICKED FOR YOU</span><h2>خدمات <em>متاحة الآن</em></h2></div><a class="text-link" href="/services.php">الكل ←</a></div>
 <?php if($services): ?><div class="popular-grid"><?php foreach($services as $s): ?><a class="popular-card" href="/service.php?slug=<?=rawurlencode($s['slug'])?>"><span class="mini-icon">✦</span><small><?=h($s['category'])?></small><b><?=h($s['name_ar'])?></b><strong><?=h(money(price_sdg($s,$rate)))?> <small>ج.س</small></strong><span class="popular-cta">التفاصيل ←</span></a><?php endforeach; ?></div><?php else: ?><div class="empty-state">سيتم عرض الخدمات هنا بعد إضافتها من لوحة الإدارة.</div><?php endif; ?></div></section>
<section class="trust-strip"><div><b>♧</b><span><strong>حساب شخصي</strong><small>طلباتك وسجلك في مكان واحد</small></span></div><div><b>◈</b><span><strong>أسعار واضحة</strong><small>بالدولار أو الجنيه السوداني</small></span></div><div><b>⚡</b><span><strong>متابعة الطلب</strong><small>اعرف حالة طلبك من حسابك</small></span></div><div><b>☏</b><span><strong>دعم فني</strong><small>تواصل عند الحاجة للمساعدة</small></span></div></section>
<section class="bottom-cta"><div><span class="eyebrow">YOUR SOFTWARE PARTNER</span><h2>جاهز تبدأ؟ <em>حسابك بانتظارك.</em></h2><p>سجل الآن لتصفح الخدمات وإدارة رصيدك وطلباتك.</p></div><div class="hero-actions"><a class="btn btn-gold" href="/register.php">إنشاء حساب</a><a class="btn btn-outline" href="/login.php">تسجيل الدخول</a></div></section>
<?php app_footer(); ?>
