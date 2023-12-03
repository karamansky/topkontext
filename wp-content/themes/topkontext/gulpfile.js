let project_folder = "assets";
let source_folder = "src";

let path = {
    build: {
        css: project_folder + "/css/",
        js: project_folder + "/js/",
        libs: project_folder + "/libs/",
        images: project_folder + "/img/",
        fonts: project_folder + "/fonts/"
    },
    src: {
        css: [
            source_folder + "/scss/*.scss",
        ],
        js: source_folder + "/js/*.js",
        libs: source_folder + "/libs/**/*",
        images: source_folder + "/img/**/*",
        fonts: source_folder + "/fonts/**/*",
        ttffonts: source_folder + "/fonts/**/*.ttf"
    },
    watch: {
        css: source_folder + "/scss/**/*.scss",
        js: source_folder + "/js/**/*.js",
        images: source_folder + "/img/**/*"
    },
    clean: "./" + project_folder + "/"
};

let { src, dest } = require('gulp'),
    gulp = require('gulp'),
    fileinclude = require('gulp-file-include'),
    del = require('del'),
    scss = require('gulp-sass')(require('sass')),
    autoprefixer = require('gulp-autoprefixer'),
    gulp_media = require('gulp-group-css-media-queries'),
    clean_css = require('gulp-clean-css'),
    rename = require('gulp-rename'),
    woff2 = require('gulp-ttf2woff2'),
    woff = require('gulp-ttf2woff'),
    uglify = require('gulp-uglify-es').default,
    browserSync = require('browser-sync').create();
concat = require('gulp-concat');

function browsersync() {
    browserSync.init({
        server: {
            baseDir: "./" + project_folder + "/"
        },
        port: 3000,
        notify: false
    })
}

function img() {
    return src(path.src.images)
        .pipe(dest(path.build.images))
}

function js() {
    return src(path.src.js)
        .pipe(fileinclude())
        .pipe(dest(path.build.js))
        .pipe(concat('scripts.js'))
        .pipe(dest(path.build.js))
        .pipe(uglify())
        .pipe(rename({
            extname: ".min.js"
        }))
        .pipe(dest(path.build.js))
        .pipe(browserSync.stream())
}

function libs() {
    return src(path.src.libs)
        .pipe(dest(path.build.libs))
        .pipe(browserSync.stream())
}

function css() {
    return src(path.src.css)
        .pipe(scss({
            outputStyle: "expanded"
        }))
        .pipe(autoprefixer({
            overrideBrowserslist: ["last 5 versions"],
            cascade: true
        }))
        .pipe(gulp_media())
        .pipe(dest(path.build.css))
        .pipe(clean_css())
        .pipe(rename({
            extname: ".min.css"
        }))
        .pipe(dest(path.build.css))
        .pipe(browserSync.stream())
}

function watchFiles() {
    gulp.watch([path.watch.css], css),
        gulp.watch([path.watch.js], js),
        gulp.watch([path.watch.images], img)
}

function clean() {
    return del(path.clean)
}

function fonts() {
    src(path.src.ttffonts)
        .pipe(woff())
        .pipe(dest(path.build.fonts));
    src(path.src.fonts)
        .pipe(woff())
        .pipe(dest(path.build.fonts));
    return src(path.src.fonts)
        .pipe(woff2())
        .pipe(dest(path.build.fonts))
}

let build = gulp.series(clean, gulp.parallel(libs, js, css, img, fonts));
let watch = gulp.parallel(build, watchFiles);

exports.libs = libs;
exports.js = js;
exports.img = img;
exports.css = css;
exports.watch = watch;
exports.fonts = fonts;
exports.build = build;
exports.default = watch;
