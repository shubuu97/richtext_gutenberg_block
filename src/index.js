const { registerBlockType } = wp.blocks;
const { RichText } = wp.blockEditor;

registerBlockType("custom-block/richtext", {
    title: "RichText Block",
    description: "This is a simple richtext block.",
    icon: "universal-access-alt",
    category: "layout",
    attributes: {
        content: {
            type: "array",
            source: "children",
            selector: "p",
        },
    },
    edit: ({ attributes: { content }, setAttributes, className }) => {
        const handleChange = (updatedContent) => {
            setAttributes({ content: updatedContent });
        };
        return (
            <RichText className={className} tageName="p" onChange={handleChange} value={content} />
        );
    },
    save: ({ attributes: { content }, className }) => {
        return <RichText.Content className={className} tagName="p" value={content} />;
    },
});
