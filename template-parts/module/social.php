<div class="social">
  <?
		
		$colorSocial = $args['color'];

		$masSocial = [['vk','vk'.$colorSocial.'.svg'],['inst','instagram'.$colorSocial.'.svg'],['tw','twitter'.$colorSocial.'.svg'],['facebook','facebook'.$colorSocial.'.svg'],['youtube','youtube'.$colorSocial.'.svg'],['google','google'.$colorSocial.'.svg']];
		foreach($masSocial as $socItem){
			if($GLOBALS['crbAll'][$socItem[0]]){?>
  <a class="social-ico<?echo $colorSocial;?>" href="<? echo $GLOBALS['crbAll'][$socItem[0]]; ?>"><img
      src="<? echo get_theme_file_uri('/frontend/images/social/'.$socItem[1]); ?>" alt=""></a>
  <?}
					}?>
</div>