var DropzoneExample = function () {
    var DropzoneDemos = function () {
        Dropzone.options.singleFileUpload = {
            paramName: "photo",
            maxFiles: 1,
            maxFilesize: 5,
            dictDefaultMessage: "default message",
            addRemoveLinks: true,
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        };
        Dropzone.options.multiFileUpload = {
            paramName: "images",
            maxFiles: 5,
            maxFilesize: 10,
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        };
        Dropzone.options.fileTypeValidation = {
            paramName: "file",
            maxFiles: 10,
            maxFilesize: 10,
            acceptedFiles: "image/*,application/pdf,.psd",
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        };
    }
    return {
        init: function() {
            DropzoneDemos();
        }
    };
}();
DropzoneExample.init();
