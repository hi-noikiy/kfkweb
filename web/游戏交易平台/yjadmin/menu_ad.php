  <div class="d1">广告管理</div>
  <div class="d2">
  <a href="adtype.php">广告管理</a>
  </div>
  
  <div class="d1">帮助中心</div>
  <div class="d2">
  <a href="helplist.php">帮助列表</a>
  <a href="helplx.php">添加帮助信息</a>
  </div>
  
  <div class="d1">任务大厅</div>
  <div class="d2">
  <a href="tasklist.php">单人任务</a>
  <a href="tasklist.php?zt=1"  class="red">审核单人任务</a>
  <a href="taskhflist.php">单人任务接手</a>
  <a href="tasklist1.php">多人任务</a>
  <a href="tasklist1.php?zt=105"  class="red">审核多人任务</a>
  <a href="taskhflist1.php">多人任务接手</a>
  </div>
  
  <div class="d1">工单管理</div>
  <div class="d2">
  <a href="gdlist.php">所有工单</a>
  <? for($i=1;$i<=4;$i++){?>
  <a href="gdlist.php?gdzt=<?=$i?>"><?=returngdzt($i)?></a>
  <? }?>
  </div>










