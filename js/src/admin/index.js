import app from 'flarum/admin/app';

app.initializers.add('datlechin/flarum-title-length', () => {
  app.extensionData
    .for('datlechin-title-length')
    .registerSetting({
      setting: 'datlechin-title-length.limit',
      label: app.translator.trans('datlechin-title-length.admin.settings.limit_label'),
      help: app.translator.trans('datlechin-title-length.admin.settings.limit_help'),
      type: 'boolean',
    })
    .registerSetting({
      setting: 'datlechin-title-length.min',
      label: app.translator.trans('datlechin-title-length.admin.settings.min_label'),
      help: app.translator.trans('datlechin-title-length.admin.settings.min_help'),
      type: 'number',
    })
    .registerSetting({
      setting: 'datlechin-title-length.max',
      label: app.translator.trans('datlechin-title-length.admin.settings.max_label'),
      help: app.translator.trans('datlechin-title-length.admin.settings.max_help'),
      type: 'number',
    });
});
