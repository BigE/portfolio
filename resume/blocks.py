from wagtail.core import blocks
from wagtail.snippets.blocks import SnippetChooserBlock


class ResumeEducationBlock(blocks.StructBlock):
    date_started = blocks.DateBlock(help_text='Date you started your education')
    date_ended = blocks.DateBlock(required=False,
                                  help_text='Date you ended your education, leave blank if currently enrolled')
    educator_name = blocks.CharBlock(help_text='Name of the school or college')
    educator_description = blocks.TextBlock(required=False, help_text='A short description of what you learned')

    def __str__(self):
        return self.educator_name

    class Meta:
        template = 'resume/blocks/resume_education_block.html'


class ResumeEducationListBlock(blocks.StructBlock):
    header = blocks.CharBlock(max_length=200)
    education = blocks.ListBlock(ResumeEducationBlock)

    def __str__(self):
        return self.header

    class Meta:
        icon = 'edit'
        template = 'resume/blocks/resume_education_list_block.html'


class ResumeExperienceBlock(blocks.StructBlock):
    date_started = blocks.DateBlock()
    date_ended = blocks.DateBlock(required=False)
    company_name = blocks.CharBlock(max_length=500)
    position = blocks.CharBlock(max_length=100)
    location = blocks.CharBlock(max_length=250)
    description = blocks.RichTextBlock()

    def __str__(self):
        return self.company_name

    class Meta:
        template = 'resume/blocks/resume_experience_block.html'


class ResumeExperienceListBlock(blocks.StructBlock):
    header = blocks.CharBlock(max_length=200)
    experience = blocks.ListBlock(ResumeExperienceBlock)

    def __str__(self):
        return self.header

    class Meta:
        icon = 'list-ul'
        template = 'resume/blocks/resume_experience_list_block.html'


class ResumeSkillsBlock(blocks.StructBlock):
    header = blocks.CharBlock(max_length=150)
    skills = blocks.ListBlock(SnippetChooserBlock('resume.ResumeSkill'))

    def __str__(self):
        return self.header

    class Meta:
        icon = 'user'
        template = 'resume/blocks/resume_skills_block.html'

