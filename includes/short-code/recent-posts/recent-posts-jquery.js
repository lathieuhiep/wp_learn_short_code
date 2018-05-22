(function() {

    tinymce.PluginManager.add('recent-posts', function(editor, url) {

        editor.addButton('recent-posts', {
            text: 'Recent Posts',
            icon: false,
            onclick: function() {
                editor.windowManager.open({

                    title: 'Recent Posts'

                })
            }
        });

    });

})();