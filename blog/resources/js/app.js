import Editor from '@toast-ui/editor'
import 'codemirror/lib/codemirror.css';
import '@toast-ui/editor/dist/toastui-editor.css';

const editor = new Editor({
    el: document.querySelector('#editor'),
    height: '400px',
    initialEditType: 'markdown',
    placeholder: 'Write stuff here...',
})

if (document.querySelector('#createPostForm')){
    document.querySelector('#createPostForm').addEventListener('submit', e => {
       e.preventDefault();
       document.querySelector('#body').value = editor.getMarkdown();
       e.target.submit();
    });
}

if (document.querySelector('#editPostForm')) {
    editor.setMarkdown(document.querySelector('#oldBody').value);

    document.querySelector('#editPostForm').addEventListener('submit', e => {
        e.preventDefault();
        document.querySelector('#body').value = editor.getMarkdown();
        e.target.submit();
    });
}

