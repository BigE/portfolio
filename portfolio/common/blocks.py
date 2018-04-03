from wagtail.core import blocks
from wagtailstreamforms.blocks import WagtailFormBlock


class ButtonBlock(blocks.StructBlock):
    button_icon = blocks.CharBlock(max_length=50, required=False)
    button_class = blocks.CharBlock(max_length=200, required=False,
                                    help_text='Extra css classes to add to button')
    button_page = blocks.PageChooserBlock(required=False)
    button_url = blocks.URLBlock(required=False)
    button_text = blocks.CharBlock(max_length=250)

    class Meta:
        template = 'common/blocks/button_block.html'


class HeaderBlock(blocks.StructBlock):
    header_icon = blocks.CharBlock(max_length=50, required=False)
    header_text = blocks.CharBlock(max_length=250)


class FooterBlock(blocks.StructBlock):
    alignment = blocks.ChoiceBlock([
        ('', 'Default'),
        ('centered', 'Centered'),
    ], default='', required=False)
    buttons = blocks.StreamBlock([
        ('button', ButtonBlock()),
    ], required=False)


class PanelBlock(blocks.StructBlock):
    header = HeaderBlock()
    body = blocks.RichTextBlock()
    footer = FooterBlock()

    class Meta:
        icon = 'code'
        template = 'common/blocks/panel_block.html'


class TwoPanePanelBlock(blocks.StructBlock):
    panel_alignment = blocks.ChoiceBlock(choices=[
        ('left', 'Left'),
        ('right', 'Right'),
    ], default='left')
    content_pane = blocks.RichTextBlock()
    panel_pane = PanelBlock()

    class Meta:
        icon = 'table'
        template = 'common/blocks/two_pane_panel_block.html'


class StandardBodyStreamBlock(blocks.StreamBlock):
    richtext = blocks.RichTextBlock()
    html = blocks.RawHTMLBlock()
    panel = PanelBlock()
    twopane = TwoPanePanelBlock()
    form = WagtailFormBlock()


class SectionBlock(blocks.StructBlock):
    id = blocks.CharBlock(required=False, max_length=250,
                          help_text='HTML id of element')
    header = HeaderBlock()
    dark = blocks.BooleanBlock(required=False, help_text='Toggle the dark background variant')
    body = StandardBodyStreamBlock()

    class Meta:
        icon = 'doc-full'
        template = 'common/blocks/section_block.html'
