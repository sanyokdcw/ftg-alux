function tinymce_setup_callback(editor) {
    tinymce.init({
      menubar: false,
      selector: "textarea.richTextBox",
      toolbar:
        "customInsertButton, links, ",
      setup: function (editor2) {
        editor2.addButton('customInsertButton', {
          text: "My Button",
          onclick: function () {
            editor2.insertContent('string');
            window.editor = editor2;
            window.uploads = (form)=>{
              
              let inputs = new FormData(form);

              // console.log(inputs)
              fetch('/api/upload/storage/', {method: "POST", body: inputs}).then((response)=>{
                console.log(response);
              });
              return false;
            }
            $("body").append(`
            <form onsubmit='window.uploads(this); return false;' style="position:fixed; left:50%; top:50%; transform:translate(-50%, -50%);" class="modal-body"> 
                    <p>{{  __('content.name')  }}</p>   
                    <input name="name" type="text" placeholder="{{  __('content.name')  }}">
                </form>`)
            
          }
        });
          },
      skin_url:
        $('meta[name="assets-path"]').attr("content") + "?path=js/skins/voyager",
      min_height: 100,
      height: 200,
      resize: "vertical",
      plugins: "code,",
      extended_valid_elements:
        "input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]",
      file_browser_callback: function (field_name, url, type, win) {
        if (type == "image") {
          $("#upload_file").trigger("click")
        }
      },
      convert_urls: false,
      image_caption: true,
      image_title: true,
    });
  }

// function tinymce_setup_callback(editor) {
// tinymce.init({
//       menubar: false,
//   selector: 'textarea#custom-toolbar-button',
//   toolbar: 'customInsertButton customDateButton',
//   setup: function (editor2) {

//     editor2.ui.registry.addButton('customInsertButton', {
//       text: 'My Button',
//       onAction: function (_) {
//         editor2.insertContent('&nbsp;<strong>It\'s my button!</strong>&nbsp;');
//       }
//     });

//     var toTimeHtml = function (date) {
//       return '<time datetime="' + date.toString() + '">' + date.toDateString() + '</time>';
//     };

//     editor2.ui.registry.addButton('customDateButton', {
//       icon: 'insert-time',
//       tooltip: 'Insert Current Date',
//       disabled: true,
//       onAction: function (_) {
//         editor2.insertContent(toTimeHtml(new Date()));
//       },
//       onSetup: function (buttonApi) {
//         var editorEventCallback = function (eventApi) {
//           buttonApi.setDisabled(eventApi.element.nodeName.toLowerCase() === 'time');
//         };
//         editor2.on('NodeChange', editorEventCallback);

//         /* onSetup should always return the unbind handlers */
//         return function (buttonApi) {
//           editor2.off('NodeChange', editorEventCallback);
//         };
//       }
//     });
//   },
//   content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
// });
// }