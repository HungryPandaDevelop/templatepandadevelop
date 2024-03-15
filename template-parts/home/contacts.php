<section>
  <? if(!is_page('contacts')){?>
  <div class="main-full">
    <h2>Контакты</h2>
  </div>
  <?} ?>
  <div class="contacts_home main-grid">
    <div class="contacts_home-line">
      <h3>Aдрес</h3><span>
        <? echo $GLOBALS['crbAll']['address']; ?>
      </span>
    </div>
    <div class="contacts_home-line">
      <h3>Режим работы:</h3><span>
        <div>вс-чт: 12:00 - 00:00</div>
        <div>пт-сб: 12:00 - 02:00</div>
      </span>
    </div>
    <div class="contacts_home-line">
      <h3>Телефоны:</h3>
      <? 
				foreach($GLOBALS['crbAll']['phones'] as $phone){?>
      <div><a href="tel:<? echo $phone['link']; ?>">
          <? echo $phone['title'] ?>
        </a></div>
      <?}?>
    </div>
    <div class="contacts_home-line">
      <h3>Почта:</h3>
      <a href="mailto:<? echo $GLOBALS['crbAll']['mail']; ?>">
        <? echo $GLOBALS['crbAll']['mail']; ?>
      </a>
    </div>

  </div>
  <div class="main-full map_home">
    <div class="address-for-map">
      <? $coords = carbon_get_theme_option('crb_company_location'); ?>
      <div class="contacts-address-line" id="address-0" data-coord-x="<? echo $coords['lat']; ?>"
        data-coord-y="<? echo $coords['lng']; ?>" data-index="0">
        <div class="address">
          <div class="text-address">
            <? echo $GLOBALS['crbAll']['address']; ?>
          </div>
        </div>
        <div class="phone-feedback">
          <? 
				foreach($GLOBALS['crbAll']['phones'] as $phone){?>
          <span><a href="tel:<? echo $phone['link']; ?>">
              <? echo $phone['title'] ?>
            </a></span>
          <?}?>
        </div>
      </div>
    </div>
    <div class="map-container">
      <div id="map" data-marker="<? echo get_theme_file_uri('/frontend/images/icons/marker.svg'); ?>"></div>
    </div>

    <script
      src="https://api-maps.yandex.ru/2.1/?lang=ru-RU&amp;amp;apikey=AAyE0FsBAAAApZ_zfwIA_dXSEkWE4_EY3eJc0MxKY2DPitcAAAAAAAAAAADTxJqFLJMxqfrjbNVz6ghuLNJ4tw"
      type="text/javascript"></script>
    <script src="<? echo get_theme_file_uri('/frontend/js/sourse/common-parts/ya-map.js'); ?>"></script>
  </div>
</section>