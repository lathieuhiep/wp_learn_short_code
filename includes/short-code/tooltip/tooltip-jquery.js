(function() {

    tinymce.PluginManager.add('tooltip', function(editor, url) {

        editor.addButton('tooltip', {
            text: 'Tooltip',
            icon: false,
            onclick: function() {
                editor.windowManager.open({

                    title: 'Insert Tooltip',
                    body: [
                        {
                            type: 'textbox',
                            name: 'textboxtooltipName',
                            label: 'Tooltip Text',
                            value: 'This is a tooltip'
                        },
                        {
                            type: 'listbox',
                            name: 'className',
                            label: 'Position',
                            values: [
                                {
                                    text: 'Top Tooltip',
                                    value: 'top_tooltip'
                                },
                                {
                                    text: 'Left Tooltip',
                                    value: 'left_tooltip'
                                },
                                {
                                    text: 'Right Tooltip',
                                    value: 'right_tooltip'
                                },
                                {
                                    text: 'Bottom Tooltip',
                                    value: 'bottom_tooltip'
                                }
                            ]
                        },

                    ],
                    onsubmit: function (e) {
                        editor.insertContent(
                            '[tooltip class="'+ e.data.className +'" title="' + e.data.textboxtooltipName + '"]' + editor.selection.getContent() + '[/tooltip]'
                        )
                    }

                })
            }
        });

    });

})();