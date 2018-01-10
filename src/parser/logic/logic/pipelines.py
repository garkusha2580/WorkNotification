# -*- coding: utf-8 -*-

# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: https://doc.scrapy.org/en/latest/topics/item-pipeline.html
import datetime
import json
import MySQLdb
import time


class LogicPipeline(object):
    file = None
    connect = None
    host = "localhost"
    user = "root"
    password = ""
    database = "notif"
    current_site_id = None

    def process_item(self, item, spider):
        insert_query = "insert into notif.data(site_id,title,body,keyword,meta,city,created_at,updated_at) values(%s,%s,%s,%s,%s,%s,%s,%s)"
        worker = self.connect.cursor()
        ts = time.time()
        timestamp = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
        worker.execute(insert_query,
                       (self.current_site_id,item["title"], item["body"], item["keyword"], item["meta"], item["city"], timestamp, timestamp))

        return item

    def open_spider(self, spider):
        self.connect = MySQLdb.connect(host=self.host, user=self.user, password=self.password, db=self.database,
                                       charset="utf8")
        worker = self.connect.cursor()
        select_site_query = "select id from notif.sites where home_url=%s"
        worker.execute(select_site_query, [spider.start_urls[0]])
        self.current_site_id = worker.fetchall()[0][0]

    def close_spider(self, spider):
        self.connect.commit()
        self.connect.close()
