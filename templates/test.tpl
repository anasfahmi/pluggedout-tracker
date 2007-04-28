{* Smarty *}

{if $val==true}
Hello {$name}, welcome to Smarty!
{else}
Bum
{/if}

<table border='1'>
{section name=item loop=$rows}
<tr><td>{$rows[item][0]}</td></tr>
{/section}
</table>