// {namespace name="backend/static/payment_status"}
Ext.define('Shopware.apps.PaypalUnifiedSettings.store.RefundStateChange', {
    extend: 'Ext.data.Store',

    storeId: 'SwagPaymentPayPalUnifiedRefundStateChange',

    fields: [
        { name: 'id', type: 'int' },
        { name: 'text', type: 'string' }
    ],

    data: [
        { id: 12, text: '{s name="completely_paid"}Completely paid{/s}' },
        { id: 17, text: '{s name="open"}Open{/s}' },
        { id: 20, text: '{s name="re_crediting"}Re-crediting{/s}' },
        { id: 35, text: '{s name="the_process_has_been_cancelled"}The process has been cancelled.{/s}' },
    ]
});
