
# coding: utf-8

# In[1]:


import pandas as pd





import mysql.connector as sql


# In[30]:


db_connection = sql.connect(host='localhost', database='student_learning', user='root', password='')


# In[31]:


db_cursor = db_connection.cursor()


# In[32]:


db_cursor.execute('SELECT * FROM project')


# In[33]:


table_rows = db_cursor.fetchall()


# In[45]:


df = pd.DataFrame(table_rows)
df.columns = ['id', 'uid', 'title', 'keywords', 'abstract', 'file', 'date', 'status']
df


# In[46]:


df = df[['id','abstract']]

#print(df.head())


# In[47]:


df.dropna(inplace=True)


# In[48]:


from sklearn.feature_extraction.text import TfidfVectorizer

tf = TfidfVectorizer(analyzer='word', ngram_range=(1, 3), min_df=0, stop_words='english')

matrix = tf.fit_transform(df['abstract'])


# In[49]:


from sklearn.metrics.pairwise import linear_kernel

cosine_similarities = linear_kernel(matrix,matrix)


# In[51]:


project_title = df['id']

indices = pd.Series(df.index, index=df['id'])

def project_recommend(title):

    idx = indices[title]

    sim_scores = list(enumerate(cosine_similarities[idx]))
    
    sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)

    sim_scores = sim_scores[1:31]

    project_indices = [i[0] for i in sim_scores]

    return project_title.iloc[project_indices].head(3)


# In[54]:
file=open("project_id.txt","r")
stud_id=file.read()
file.close()


recomm=project_recommend(int(stud_id))
print(list(recomm))
file=open("project_recomm.txt","w")
file.write(str(list(recomm)))
file.close()
#print(recomm[1])

