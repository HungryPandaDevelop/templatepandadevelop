<div class="product-item-info">
  <ul class="ln product-item-description">
    <li>
      <div>Тип установки:</div><b>
        <? echo get_field('tehnicheskie_harakteristiki')['osnovnye_parametry']['tip_ustanovki']; ?>
      </b>
    </li>
    <li>
      <div>Производительность:</div><b>
        <? echo get_field('tehnicheskie_harakteristiki')['osnovnye_parametry']['bunker_gotovoj_smesi']; ?>
      </b>
    </li>
    <li>
      <div>Объем смесителя:</div><b>
        <? echo get_field('tehnicheskie_harakteristiki')['osnovnye_parametry']['obem_smesitelya']; ?>
      </b>
    </li>
  </ul>
</div>