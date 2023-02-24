import io
from pdfminer.converter import TextConverter
from pdfminer.pdfinterp import PDFPageInterpreter
from pdfminer.pdfinterp import PDFResourceManager
from pdfminer.pdfpage import PDFPage
#Docx resume
import docx2txt
#Wordcloud
import re
import operator
# import nltk
# nltk.download('stopwords')
# nltk.download('punkt')
from nltk.tokenize import word_tokenize
from nltk.corpus import stopwords
set(stopwords.words('english'))
from nltk.probability import FreqDist
import matplotlib.pyplot as plt
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.metrics.pairwise import cosine_similarity

def read_pdf_resume(pdf_doc):
    resource_manager = PDFResourceManager()
    fake_file_handle = io.StringIO()
    converter = TextConverter(resource_manager, fake_file_handle)
    page_interpreter = PDFPageInterpreter(resource_manager, converter)
    with open(pdf_doc, 'rb') as fh:
        for page in PDFPage.get_pages(fh, caching=True,check_extractable=True):
            page_interpreter.process_page(page)
        text = fake_file_handle.getvalue()
    # close open handles
    converter.close()
    fake_file_handle.close()
    if text:
        return text

def read_word_resume(word_doc):
    resume = docx2txt.process(word_doc)
    resume = str(resume)
    #print(resume)
    text =  ''.join(resume)
    text = text.replace("\n", "")
    if text:
        return text

def clean_job_decsription(jd):
    ''' a function to create a word cloud based on the input text parameter'''
    ## Clean the Text
    # Lower
    clean_jd = jd.lower()
    # remove punctuation
    clean_jd = re.sub(r'[^\w\s]', '', clean_jd)
    # remove trailing spaces
    clean_jd = clean_jd.strip()
    # remove numbers
    clean_jd = re.sub('[0-9]+', '', clean_jd)
    clean_jd = clean_jd.replace(" I ", " ")
    clean_jd = clean_jd.replace(" i ", " ")
    clean_jd = clean_jd.replace(" me ", " ")
    clean_jd = clean_jd.replace(" my ", " ")
    clean_jd = clean_jd.replace(" we ", " ")
    clean_jd = clean_jd.replace(" us ", " ")
    clean_jd = clean_jd.replace(" our ", " ")
    clean_jd = clean_jd.replace(" you ", " ")
    clean_jd = clean_jd.replace(" your ", " ")
    clean_jd = clean_jd.replace("I am", " ")
    clean_jd = clean_jd.replace("I'm", " ")
    # tokenize
    clean_jd = word_tokenize(clean_jd)
    # remove stop words
    stop = stopwords.words('english')
    clean_jd = [w for w in clean_jd if not w in stop]
    return(clean_jd)

def get_resume_score(text):
    cv = CountVectorizer(stop_words='english')
    count_matrix = cv.fit_transform(text)
    #Print the similarity scores
    print("\nSimilarity Scores:")

    #get the match percentage
    matchPercentage = cosine_similarity(count_matrix)[0][1] * 100
    matchPercentage = round(matchPercentage, 2) # round to two decimal

    print("Your resume matches about "+ str(matchPercentage)+ "\% of the job description.")

if __name__ == '__main__':
    extn = input("Enter File Extension: ")
    #print(extn)
    if extn == "pdf":
        resume = read_pdf_resume('D:\\Project\\Internity\\storage\\app\\public\\resumes\\CV_Hermawan.pdf')
    else:
        resume = read_word_resume('test_resume.docx')

    with open('D:\\Project\\Internity\\app\\Http\\Controllers\\Api\\Python\\test.txt', 'r') as file:
        job_description = file.read().replace('\n', '')
    ## Get a Keywords Cloud
    clean_jd = clean_job_decsription(job_description)
    clean_resume = clean_job_decsription(resume)
    print(clean_resume)
    # create_word_cloud(clean_jd) text = [resume, job_description]
    text =  [' '.join(clean_resume), ' '.join(clean_jd)]

    # ## Get a Match score
    get_resume_score(text)
