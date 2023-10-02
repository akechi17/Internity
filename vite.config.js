import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";

const hash = Math.floor(Math.random() * 90000) + 10000;

export default defineConfig({
    server: {
        host: true,
        hmr: {
            host: "localhost",
        },
    },
    plugins: [
        laravel({
            input: ["resources/js/app.js"],
            refresh: true,
        }),
    ],

    resolve: {
        alias: {
            "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
            "~bootstrap-icons": path.resolve(
                __dirname,
                "node_modules/bootstrap-icons/font"
            ),
            "~trix": path.resolve(__dirname, "node_modules/trix"),
        },
    },

    build: {
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes("node_modules")) {
                        return id
                            .toString()
                            .split("node_modules/")[1]
                            .split("/")[0]
                            .toString();
                    }
                },
                entryFileNames: `[name]${hash}.js`,
                chunkFileNames: `[name]${hash}.js`,
                assetFileNames: `[name]${hash}.[ext]`,
            },
        },
    },
});
