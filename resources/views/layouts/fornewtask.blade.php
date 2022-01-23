@if(isset($task->id))
<script>
let var_for_id_task = Number(<?echo $task->id?>);
console.log(var_for_id_task);
</script>
@endif
