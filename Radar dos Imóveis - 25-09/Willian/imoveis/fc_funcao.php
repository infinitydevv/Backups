<?php
function criarCombo($table,$id,$valor)
{
   $sql = "SELECT * FROM ".$table."";
   $rs_sql = mysql_query($sql);
   while($linha=mysql_fetch_array($rs_sql))
   {
     $chave = $linha[$id];
     $nome  = $linha[$valor];
     $combo = $combo . "<option value=\"$id\">$nome</option>";
   }
   echo $combo;
}
?>