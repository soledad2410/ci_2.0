<?foreach($plugin_config as $config):
if(trim($config)!='' && $config!='0'):
?>
   <div class="field">
   <div class="label"><label for="autocomplete"><?=$config?></label></div>
   <div class="input" ><input size="15"  type="text" name="plugin_config[]"  size="40"  /></div>
</div>
<?
endif;
endforeach;?>