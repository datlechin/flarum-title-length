import Extend from 'flarum/common/extenders';
import app from 'flarum/admin/app';

export default [
  new Extend.Admin()
    .setting(() => ({
      setting: 'datlechin-title-length.limit',
      type: 'boolean',
      label: app.translator.trans('datlechin-title-length.admin.settings.limit_label'),
      help: app.translator.trans('datlechin-title-length.admin.settings.limit_help'),
    }))
    .setting(() => ({
      setting: 'datlechin-title-length.min',
      type: 'number',
      label: app.translator.trans('datlechin-title-length.admin.settings.min_label'),
      help: app.translator.trans('datlechin-title-length.admin.settings.min_help'),
    }))
    .setting(() => ({
      setting: 'datlechin-title-length.max',
      type: 'number',
      label: app.translator.trans('datlechin-title-length.admin.settings.max_label'),
      help: app.translator.trans('datlechin-title-length.admin.settings.max_help'),
    })),
];
