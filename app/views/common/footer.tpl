<!--[if lte IE 8]><script type="text/javascript" src="/mvc/js/getElementsByClassName.js"></script><![endif]-->
<script type="text/javascript" src="/mvc/js/jquery-1.10.2.js"></script>
{if isset($scripts)}{foreach from=$scripts item=val} 
<script type="text/javascript" src="/mvc/js/{$val}.js"></script>{/foreach}{/if}

</body>
</html>
