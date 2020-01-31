import edit from "./edit";
import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";

registerBlockType("catenamedia/blocks/example-block", {
    title: __("Example block", "example-block"),
    description: __("Example block description", "example-block"),
    icon: "vault",
    category: "example-category",
    edit: edit,
    save() {
        return null;
    }
});