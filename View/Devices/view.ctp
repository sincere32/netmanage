<?php
  $id = $device['Device']['id'];
  $name = $device['Device']['name'];
  $ipAddr = $device['Device']['friendly_ip_addr'];
  $serialNumber = $device['Device']['serial'];
  $model = $device['Device']['model'];
  $sysObjectId = $device['Device']['sys_object_id'];
  $firmware = $device['Device']['firmware'];
  $lastSeen = $device['Device']['last_seen'];
  $created = $device['Device']['created'];
?>

<?php
  $this->extend('/Common/default');
  $this->assign('title', $name);
?>

<?php $this->start('actions');
  echo $this->ActionMenu->menu(array(
    'Delete' => array(
      'url' => "/devices/delete/${id}",
      'confirm' => 'Click OK to confirm you want to delete this device.',
      'enabled' => in_array($__userRole, array('administrator'))
    )
  ));
$this->end(); ?>

<ol class="breadcrumb">
  <li><?php echo $this->Html->link('Devices', '/devices'); ?></li>
  <li class="active"><?php echo $name; ?></li>
</ol>

<section>
  <h3>Attributes</h3>
  <table class="table">
    <tr>
      <td>IP Address</td>
      <td><?php echo $this->Html->link($ipAddr, "ssh://$ipAddr"); ?></td>
    </tr>
    <tr>
      <td>Serial Number</td>
      <td><?php echo $serialNumber; ?></td>
    </tr>
    <tr>
      <td>Model</td>
      <td><?php echo $model; ?></td>
    </tr>
    <tr>
      <td>SysObjectId</td>
      <td><?php echo $sysObjectId; ?></td>
    <tr>
      <td>Firmware</td>
      <td><?php echo $firmware; ?></td>
    </tr>
    <tr>
      <td>Last Seen</td>
      <td><?php echo $lastSeen; ?></td>
    </tr>
    <tr>
      <td>First Seen</td>
      <td><?php echo $created; ?></td>
    </tr>
  </table>
</section> <!-- /.attributes -->

<section>
  <h3>Neighbors</h3>
    <?php echo $this->DataTables->table(
    'neighbors',
    array(
      'Neighbor Name',
      'Local Port',
      'Neighbor Port',
      'Last Seen'
    ),
    "/devices/neighbors/${id}.json",
    array(
      'class' => 'table-bordered table-striped table-condensed',
      'data-length' => 10,
    )
  ); ?>
</section> <!-- /neighbors -->

<section>
  <h3>Configurations</h3>
  <?php echo $this->DataTables->table(
    'configs',
    array(
      'Timestamp',
      'Diff'
    ),
    "/devices/configs/${id}.json",
    array(
      'class' => 'table-bordered table-striped table-condensed',
      'data-length' => 2
    )
  ); ?>
</section> <!-- /configurations -->

<section>
  <h3>Logs</h3>
  <?php echo $this->DataTables->table(
    'logs',
    array(
      'Timestamp',
      'Fac/Sev/Mnem',
      'Message'
    ),
    "/device_logs/llist/${id}.json",
    array(
      'class' => 'table-bordered table-striped table-condensed',
      'data-length' => 10,
    )
  ); ?>
</section>
