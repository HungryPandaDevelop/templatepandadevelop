<div class="product-item-info">
  <ul class="ln product-item-description">
    <li>
      <div>Производительность:</div><b>
        <? echo get_field('tehnicheskie_harakteristiki')['osnovnye_parametry']['tip_ustanovki']; ?>
      </b>
    </li>
    <li>
      <div>Объём смесителя:</div><b>
        <? echo get_field('tehnicheskie_harakteristiki')['osnovnye_parametry']['bunker_gotovoj_smesi']; ?>
      </b>
    </li>
    <li>
      <div>Мощность привода смесителя:</div><b>
        <? echo get_field('tehnicheskie_harakteristiki')['bunker_goryachih_mineralov']['objom_bunkera']; ?>
      </b>
    </li>
  </ul>
</div>