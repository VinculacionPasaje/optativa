# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# Note that this schema.rb definition is the authoritative source for your
# database schema. If you need to create the application database on another
# system, you should be using db:schema:load, not running all the migrations
# from scratch. The latter is a flawed and unsustainable approach (the more migrations
# you'll amass, the slower it'll run and the greater likelihood for issues).
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema.define(version: 20180129023701) do

  create_table "actors", force: :cascade do |t|
    t.string "name"
    t.string "last_name"
    t.date "birthdate"
    t.string "state"
  end

  create_table "actors_series", force: :cascade do |t|
    t.integer "actor_id", limit: 19, precision: 19
    t.integer "serie_id", limit: 19, precision: 19
    t.index ["actor_id"], name: "i_actors_series_actor_id"
    t.index ["serie_id"], name: "i_actors_series_serie_id"
  end

  create_table "categories", force: :cascade do |t|
    t.string "categorie"
    t.string "state"
  end

  create_table "chapters", force: :cascade do |t|
    t.string "name"
    t.string "description"
    t.date "fecha"
    t.string "duration"
    t.integer "year", precision: 38
    t.string "state"
    t.integer "season_id", precision: 38
    t.index ["season_id"], name: "index_chapters_on_season_id"
  end

  create_table "languages", force: :cascade do |t|
    t.string "language"
    t.string "state"
  end

  create_table "seasons", force: :cascade do |t|
    t.string "season"
    t.string "path"
    t.string "description"
    t.date "year"
    t.string "photo"
    t.string "cover"
    t.string "coverphoto"
    t.string "state"
    t.integer "serie_id", precision: 38
    t.index ["serie_id"], name: "index_seasons_on_serie_id"
  end

  create_table "series", force: :cascade do |t|
    t.string "name"
    t.date "year"
    t.string "description"
    t.string "path"
    t.string "director"
    t.string "productora"
    t.string "trailer"
    t.string "photo"
    t.string "state"
    t.integer "category_id", precision: 38
    t.index ["category_id"], name: "index_series_on_category_id"
  end

  create_table "serverschapters", force: :cascade do |t|
    t.string "name"
    t.string "embed_code"
    t.string "state"
    t.integer "language_id", precision: 38
    t.integer "chapter_id", precision: 38
    t.index ["chapter_id"], name: "i_serverschapters_chapter_id"
    t.index ["language_id"], name: "i_serverschapters_language_id"
  end

  add_foreign_key "actors_series", "actors"
  add_foreign_key "actors_series", "series", column: "serie_id"
  add_foreign_key "chapters", "seasons"
  add_foreign_key "seasons", "series", column: "serie_id"
  add_foreign_key "series", "categories"
  add_foreign_key "serverschapters", "chapters"
  add_foreign_key "serverschapters", "languages"
end
