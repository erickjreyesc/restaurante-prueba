<div>
    <livewire:admin.misc.breadcumbs title="Configuración" />

    @livewire('admin.security.setting.model-boolean', [
    'model' => $config[0]
    ], key($config[0]->id)) 
    <hr>
    @livewire('admin.security.setting.model-selected', [
    'config' => $config[3],
    'model' => $dependences,
    ], key($config[3]->id))
    <hr>
    @livewire('admin.security.setting.model-integer', [
    'model' => $config[4]
    ], key($config[4]->id))
    <hr>
    @livewire('admin.security.setting.model-integer', [
    'model' => $config[5]
    ], key($config[5]->id))
    <hr>
    @livewire('admin.security.setting.model-integer', [
    'model' => $config[6]
    ], key($config[6]->id))
    <hr>
    @livewire('admin.security.setting.model-integer', [
    'model' => $config[7]
    ], key($config[7]->id))
    <hr>
</div>
